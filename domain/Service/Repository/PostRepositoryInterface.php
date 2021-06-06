<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

use Domain\Model\Entity\Post;
use Domain\Model\ValueObject\PostId;
use Domain\Model\ValueObject\PostThreadId;

interface PostRepositoryInterface
{
    public function findAll(PostThreadId $threadId): array;
    //PostThreadId型の$threadIdを入れるとarrayを返してくれる

    public function findTargetPost(PostId $id): Post;
}
