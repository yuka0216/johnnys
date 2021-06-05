<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Image as ImageModel;
use App\Post as PostModel; //as 別名
use App\User as UserModel;
use App\Profile as ProfileModel;
use Domain\Model\Entity\Post;
use Domain\Model\Factory\ImageFactory;
use Domain\Model\Factory\PostFactory;
use Domain\Model\Factory\ProfileFactory;
use Domain\Model\Factory\UserFactory;
use Domain\Model\ValueObject\PostId;
use Domain\Model\ValueObject\PostThreadId;
use Domain\Service\Repository\PostRepositoryInterface;

final class PostRepository implements PostRepositoryInterface
{
    private $postModel;
    private $userModel;
    private $imageModel;

    public function __construct(PostModel $postModel, UserModel $userModel, ImageModel $imageModel, ProfileModel $profileModel) //モデルのPostの機能を使える$postModelをセット
    {
        $this->postModel = $postModel;
        $this->userModel = $userModel;
        $this->imageModel = $imageModel;
        $this->profileModel = $profileModel;
    }

    public function findAll(PostThreadId $threadId): array
    {
        $posts = $this->postModel->where('thread_id', $threadId->value())->orderBy('created_at', 'desc')->get();

        $postEntities = [];
        foreach ($posts as $post) {
            $profile = $this->profileModel->where('user_id', $post->user_id)->first();
            $profileEntity = ($profile == null) ? null : ProfileFactory::create($profile->id, $profile->name, $profile->favorite, $profile->free_writing, $profile->profile_image_path);

            $user = $this->userModel->where('id', $post->user_id)->first();
            $userEntity = UserFactory::create($user->id, $user->name, $profileEntity);

            $images = $this->imageModel->where('post_id', $post->id)->get();
            $imageEntities = ImageFactory::createMultiple($images);

            $postEntities[] = PostFactory::create($post->id, $userEntity, $post->thread_id, $post->comment, $imageEntities, $post->created_at);
        }
        return $postEntities;
    }


    public function findTargetPost(PostId $id): Post
    {
        $post = $this->postModel->find($id->value());

        $images = $this->imageModel->where('post_id', $post->id)->get();
        $imageEntities = ImageFactory::createMultiple($images);

        $profile = $this->profileModel->where('user_id', $post->user_id)->first();
        $profileEntity = ($profile == null) ? [] : ProfileFactory::create($profile->id, $profile->name, $profile->favorite, $profile->free_writing, $profile->profile_image_path);

        $user = $this->userModel->where('id', $post->user_id)->first();
        $userEntity = UserFactory::create($user->id, $user->name, $profileEntity);

        $postEntity = PostFactory::create($post->id, $userEntity, $post->thread_id, $post->comment, $imageEntities, $post->created_at);
        return $postEntity;
    }
}
