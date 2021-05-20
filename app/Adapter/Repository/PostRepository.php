<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Post as PostModel; //as 別名
use Domain\Model\Entity\Post;
use Domain\Model\ValueObject\PostComment;
use Domain\Model\ValueObject\PostId;
use Domain\Model\ValueObject\PostThreadId;
use Domain\Model\ValueObject\PostUserId;
use Domain\Service\Repository\PostRepositoryInterface;

final class PostRepository implements PostRepositoryInterface
{
    private $postModel;

    public function __construct(PostModel $postModel) //モデルのPostの機能を使える$postModelをセット
    {
        $this->postModel = $postModel;
    }

    public function findAll(PostThreadId $threadId): array
    {
        $posts = $this->postModel->where('thread_id', $threadId->value())->orderBy('created_at', 'desc')->get();
        $postEntities = [];
        foreach ($posts as $post) {
            $postEntities[] = new Post(
                new PostId($post->id),
                new PostUserId($post->user_id),
                new PostThreadId($post->thread_id),
                new PostComment($post->comment),
                $post->created_at
            );
        }
        return $postEntities;
    }
}
