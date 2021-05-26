<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

use Domain\Model\ValueObject\ThreadId;

interface ThreadRepositoryInterface
{
    public function findAll(): array;
    public function threadName(ThreadId $threadId): object;
}
