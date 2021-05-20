<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

use Domain\Model\ValueObject\PostThreadId;

interface PostRepositoryInterface
{
    public function findAll(PostThreadId $threadId): array;
    //PostThreadId型の$threadIdを入れるとarrayを返してくれる
}
