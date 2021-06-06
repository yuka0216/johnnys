<?php

declare(strict_types=1);

namespace Domain\Model\Factory;

use Domain\Model\Entity\Thread;
use Domain\Model\ValueObject\ThreadId;
use Domain\Model\ValueObject\ThreadName;

class ThreadFactory
{
    public static function create(int $id, string $name, array $artists): Thread
    {
        return new Thread(
            new ThreadId($id),
            new ThreadName($name),
            $artists
        );
    }

    public static function createMultiple($threadParams, $artistEntities): array
    {
        $threadEntities = [];
        foreach ($threadParams as $threadParam) {
            $artists = $artistEntities[$threadParam->id] ?? [];
            $threadEntities[] = self::create($threadParam->id, $threadParam->thread_name, $artists);
        }
        return $threadEntities;
    }
}
