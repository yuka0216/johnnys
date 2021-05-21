<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Thread as ThreadModel;
use Domain\Model\Entity\Thread;
use Domain\Model\ValueObject\ThreadId;
use Domain\Model\ValueObject\ThreadName;
use Domain\Model\ValueObject\ThreadArtistId;
use Domain\Service\Repository\ThreadRepositoryInterface;

final class ThreadRepository implements ThreadRepositoryInterface
{
    private $threadModel;

    public function __construct(ThreadModel $threadModel)
    {
        $this->threadModel = $threadModel;
    }

    public function findAll(): array
    {
        $threads = $this->threadModel->all();
        $threadEntities = [];
        foreach ($threads as $thread) {
            $threadEntities[] = new Thread(
                new ThreadId($thread->id),
                new ThreadName($thread->thread_name),
                new ThreadArtistId($thread->artist_id),
            );
        }
        return $threadEntities;
    }

    public function threadName(ThreadId $threadId): object
    {
        $thread_name = $this->threadModel->where('id', $threadId->value())->value('thread_name');
        return new ThreadName($thread_name);
    }
}
