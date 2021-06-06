<?php

namespace App\Http\Controllers;

use App\Adapter\Repository\ArtistRepository;
use App\Adapter\Repository\PostRepository;
use App\Adapter\Repository\ProfileRepository;
use App\Adapter\Repository\ThreadRepository;
use App\Http\Requests\createThreadRequest;
use App\Http\Requests\createPostRequest;
use Illuminate\Http\Request;
use App\Http\Requests\createSettingRequest;
use App\Post;
use App\Thread;
use App\Threads_artist;
use App\Profile;
use App\Image;
use Domain\Model\ValueObject\PostId;
use Domain\Model\ValueObject\PostThreadId;
use Domain\Model\ValueObject\ThreadId;
use Domain\Model\ValueObject\UserId;
use Illuminate\Support\Facades\Auth;

class ArtistController extends controller
{
    public function groupMemberIndex(ArtistRepository $artistRepository)
    {
        $artists = $artistRepository->fetchProfilesByGroupName("Snow Man");
        $image = "C:\bbs\snowman";
        return view('artist.snowmanmember', ['artists' => $artists, 'image' => $image]);
    }

    public function artistIndex(Request $request, ArtistRepository $artistRepository)
    {
        $searchWordList = $artistRepository->makeSearchWordList($request);
        $artists = $artistRepository->fetchProfileBySearch($searchWordList);
        $image = "C:\bbs\snowman";

        return view('artist.artistList', ['artists' => $artists, 'image' => $image, 'searchWordList' => $searchWordList]);
    }

    public function post(createPostRequest $request)
    {
        $user = Auth::user();
        $post = Post::postDataSave($request, $user);

        return redirect("snowman/talk/" . $request->threadId);
    }

    public function postIndex($threadId, PostRepository $postRepository, ThreadRepository $threadRepository) //newしておいてくれる(Laravelの機能)
    {
        $postThreadId = new PostThreadId($threadId);
        $posts = $postRepository->findAll($postThreadId);
        $threadIdVo = new ThreadId($threadId);
        $threads = $threadRepository->findAll();
        foreach ($threads as $thread) {
            if ($thread->equals($threadIdVo)) {
                $targetThread = clone $thread;
            }
        }

        $colorList = [
            "0" => "none",
            "1" => "pink",
            "2" => "yellow",
            "3" => "blue",
            "4" => "purple",
            "5" => "white",
            "6" => "green",
            "7" => "orange",
            "8" => "red",
            "9" => "black"
        ];

        return view('artist.talkboard', ['targetThread' => $targetThread, 'posts' => $posts, 'threads' => $threads, 'colorList' => $colorList]);
    }

    public function postEdit(Request $request, PostRepository $postRepository)
    {
        $postId = new PostId($request->id);
        $post = $postRepository->findTargetPost($postId);
        return view('artist.postEdit', ['post' => $post]);
    }

    public function postUpdate(Request $request)
    {
        $post = Post::find($request->id);
        Post::postUpdate($request, $post);

        return redirect("snowman/talk/" . $post->thread_id);
    }

    public function postDelete(Request $request)
    {
        $threadId = Post::where('id', $request->id)->value('thread_id');
        Post::where('id', $request->id)->delete();
        Image::where('post_id', $request->id)->delete();

        return redirect("snowman/talk/" . $threadId);
    }

    public function addThread(createThreadRequest $request)
    {
        Thread::addThread($request);
        $add_id = Thread::max('id');

        $artist_ids = $request->artist_id;
        foreach ($artist_ids as $artist_id) {
            Threads_artist::addThreadData($artist_id, $add_id);
            unset($request['_token']);
        }
        return redirect("snowman/talk/" . $add_id);
    }

    public function profileEdit(createSettingRequest $request)
    {
        $user_id = Auth::id();
        Profile::profileEdit($request, $user_id);
        return redirect("mypage/" . $user_id);
    }

    public function profile(ProfileRepository $profileRepository, ArtistRepository $artistRepository)
    {
        $userId = new UserId(Auth::id());
        $profile = $profileRepository->findTargetProfile($userId);
        $artists = $artistRepository->fetchProfilesByGroupName("Snow Man");
        return view('artist.profile', ['profile' => $profile, 'artists' => $artists]);
    }

    public function makeCheckBox(ThreadRepository $threadRepository, ArtistRepository $artistRepository) //スレッド新規作成画面の誰の話題か選ぶためのチェックボックス作成（とりあえずネットのコピペ）
    {
        $threadList = $threadRepository->findAll();
        $artists = $artistRepository->fetchProfilesByGroupName("Snow Man");

        return view('artist.addThread', [
            'threadList' => $threadList,
            'artists' => $artists,
        ]);
    }
}
