<?php

declare(strict_types=1);

namespace Domain\Model\Factory;

use DateTime;
use Domain\Model\Entity\Post;
use Domain\Model\Entity\User;
use Domain\Model\ValueObject\PostComment;
use Domain\Model\ValueObject\PostId;
use Domain\Model\ValueObject\PostThreadId;

class PostFactory
{
    public static function create(int $id, User $userEntity, int $threadId, string $comment, array $imageEntities, DateTime $createdAt): Post
    {
        $postEntity = new Post(
            new PostId($id),
            $userEntity,
            new PostThreadId($threadId),
            new PostComment($comment),
            $imageEntities,
            $createdAt
        );
        return $postEntity;
    }
}
