<?php

namespace App\Http\Controllers;

use App\Adapter\Repository\PostRepository;
use App\Http\Requests\createThreadRequest;
use App\Http\Requests\createPostRequest;
use Illuminate\Http\Request;
use App\Artist;
use App\Post;
use App\Thread;
use App\Profile;
use App\Image;
use Domain\Model\ValueObject\PostId;
use Domain\Model\ValueObject\PostThreadId;
use Illuminate\Support\Facades\Auth;

class ArtistController extends controller
{
    public static function makeThreadList()
    {
        $threadList = Thread::all();
        return $threadList;
    }

    public function index(Request $request)
    {
        $artists = Artist::fetchProfileBySearch($request);
        $searchWordList = Artist::makeSearchWordList($request);
        $image = "C:\bbs\snowman";

        return view('artist.all', ['artists' => $artists, 'image' => $image, 'searchWordList' => $searchWordList]);
    }

    public function post(createPostRequest $request)
    {
        $user = Auth::user();
        $post = Post::postDataSave($request, $user);

        return redirect("snowman/profile/" . $request->threadId);
    }

    public function postIndex($threadId, PostRepository $postRepository) //newしておいてくれる(Laravelの機能)
    {
        $postThreadId = new PostThreadId($threadId);
        // $postRepository = new PostRepository();
        //↑エラーになったのでPostRepository $postRepositoryを引数にしてnewした状態の$postRepositoryを使えるようにした。
        $posts = $postRepository->findAll($postThreadId);
        $threadList = self::makeThreadList();
        $thread_name = Thread::where('id', $threadId)->value('thread_name'); // $posts->thread->thread_nameとしたかったがpostsが何もないスレッドだとエラーが生じる

        return view('artist.talkboard', ['thread_name' => $thread_name, 'threadId' => $threadId, 'posts' => $posts, 'threadList' => $threadList]);
    }

    public function postEdit(Request $request, PostRepository $postRepository)
    {
        $postId = new PostId($request->id);
        $post = $postRepository->findTargetPost($postId);
        $image = Image::where('post_id', $request->id)->value('image_path');
        $threadId = $request->threadId;
        return view('artist.postEdit', ['post' => $post, 'image' => $image, 'threadId' => $threadId]);
    }

    public function postUpdate(Request $request)
    {
        $post = Post::find($request->id);
        Post::postUpdate($request, $post);

        return redirect("snowman/profile/" . $post->thread_id);
    }

    public function postDelete(Request $request)
    {
        $threadId = Post::where('id', $request->id)->value('thread_id');
        Post::where('id', $request->id)->delete();
        Image::where('post_id', $request->id)->delete();

        return redirect("snowman/profile/" . $threadId);
    }

    public function addThread(createThreadRequest $request)
    {
        $thread = Thread::addThread($request);
        $add_id = Thread::max('id');

        return redirect("snowman/profile/" . $add_id);
    }

    public function myPostIndex()
    {
        $id = Auth::user()->id;
        $myPosts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('artist.app', ['myPosts' => $myPosts]);
    }

    public function profileEdit(Request $request)
    {
        $user_id = Auth::id();
        Profile::profileEdit($request, $user_id);
        return redirect("mypage/" . $user_id);
    }

    public function setting()
    {
        $user_id = Auth::id();
        $profile = Profile::where('user_id', $user_id)->first();

        return view('artist.setting', ['profile' => $profile]);
    }

    public function makeCheckBox() //スレッド新規作成画面の誰の話題か選ぶためのチェックボックス作成（とりあえずネットのコピペ）
    {
        $threadList = self::makeThreadList();

        $chkDatas = [
            "chk01" => "佐久間大介",
            "chk02" => "岩本照",
            "chk03" => "渡辺翔太",
            "chk04" => "深澤辰也",
            "chk05" => "ラウール",
            "chk06" => "阿部亮平",
            "chk07" => "向井康二",
            "chk08" => "宮舘涼太",
            "chk09" => "目黒蓮",
        ];
        // $chk01b = false;
        // $chk02b = false;
        // $chk03b = false;
        // $chk04b = false;
        // $chk05b = false;
        // $chk06b = false;
        // $chk07b = false;
        // $chk08b = false;
        // $chk09b = false;

        // if ($chk01b) {
        //     $chkChecked["chk01"] = "checked";
        // } else {
        //     $chkChecked["chk01"] = "";
        // }
        // if ($chk02b) {
        //     $chkChecked["chk02"] = "checked";
        // } else {
        //     $chkChecked["chk02"] = "";
        // }
        // if ($chk03b) {
        //     $chkChecked["chk03"] = "checked";
        // } else {
        //     $chkChecked["chk03"] = "";
        // }
        // if ($chk04b) {
        //     $chkChecked["chk04"] = "checked";
        // } else {
        //     $chkChecked["chk04"] = "";
        // }
        // if ($chk05b) {
        //     $chkChecked["chk05"] = "checked";
        // } else {
        //     $chkChecked["chk05"] = "";
        // }
        // if ($chk06b) {
        //     $chkChecked["chk06"] = "checked";
        // } else {
        //     $chkChecked["chk06"] = "";
        // }
        // if ($chk07b) {
        //     $chkChecked["chk07"] = "checked";
        // } else {
        //     $chkChecked["chk07"] = "";
        // }
        // if ($chk08b) {
        //     $chkChecked["chk08"] = "checked";
        // } else {
        //     $chkChecked["chk08"] = "";
        // }
        // if ($chk09b) {
        //     $chkChecked["chk09"] = "checked";
        // } else {
        //     $chkChecked["chk09"] = "";
        // }
        return view('artist.addThread', [
            'threadList' => $threadList,
            'chkDatas' => $chkDatas,
            // 'chkChecked' => $chkChecked
        ]);
    }
}
