<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Image as ImageModel;
use App\Post as PostModel; //as 別名
use App\User as UserModel;
use Domain\Model\Entity\Post;
use Domain\Model\Entity\User;
use Domain\Model\ValueObject\PostComment;
use Domain\Model\ValueObject\PostId;
use Domain\Model\ValueObject\PostThreadId;
use Domain\Model\ValueObject\ProfileId;
use Domain\Model\ValueObject\ProfileUserId;
use Domain\Model\ValueObject\ProfileName;
use Domain\Model\ValueObject\ProfileFavorite;
use Domain\Model\ValueObject\ProfileFreeWriting;
use Domain\Model\ValueObject\ProfileImagePath;
use Domain\Model\ValueObject\UserId;
use Domain\Model\ValueObject\UserName;
use Domain\Service\Repository\PostRepositoryInterface;
use Illuminate\Http\Request;

final class PostRepository implements PostRepositoryInterface
{
    private $postModel;
    private $userModel;
    private $imageModel;

    public function __construct(PostModel $postModel, UserModel $userModel, ImageModel $imageModel) //モデルのPostの機能を使える$postModelをセット
    {
        $this->postModel = $postModel;
        $this->userModel = $userModel;
        $this->imageModel = $imageModel;
    }

    public function findAll(PostThreadId $threadId, ImageRepository $imageRepository, ProfileRepository $profileRepository): array
    {
        $posts = $this->postModel->where('thread_id', $threadId->value())->orderBy('created_at', 'desc')->get();
        $postEntities = [];
        foreach ($posts as $post) {
            $user = $this->userModel->where('id', $post->user_id)->first();


            $images = $this->imageModel->where('post_id', $post->id)->get();
            $imageEntities = $imageRepository->makeEntities($images);
            $profileEntities = $profileRepository->findTargetProfile(new UserId($user->id));

            $postEntities[] = new Post(
                new PostId($post->id),
                new User(
                    new UserId($user->id),
                    new UserName($user->name),
                    $profileEntities
                ),
                new PostThreadId($post->thread_id),
                new PostComment($post->comment),
                $imageEntities,
                $post->created_at
            );
        }
        return $postEntities;
    }


    public function findTargetPost(Request $request, ImageRepository $imageRepository, ProfileRepository $profileRepository): object
    {
        $post = $this->postModel->find($request->id);
        $user = $this->userModel->where('id', $post->user_id)->first();
        $images = $this->imageModel->where('post_id', $post->id)->get();
        $imageEntities = $imageRepository->makeEntities($images);
        $profileEntities = $profileRepository->findTargetProfile(new UserId($user->id));

        $postEntity = [];
        $postEntity = new Post(
            new PostId($post->id),
            new User(
                new UserId($user->id),
                new UserName($user->name),
                $profileEntities
            ),
            new PostThreadId($post->thread_id),
            new PostComment($post->comment),
            $imageEntities,
            $post->created_at
        );
        return $postEntity;
    }
}
