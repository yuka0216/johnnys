<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Thread as ThreadModel;
use App\ThreadsArtists as ThreadsArtistsModel;
use Domain\Model\Factory\ArtistFactory;
use Domain\Model\Factory\ThreadFactory;
use Domain\Service\Repository\ThreadRepositoryInterface;

final class ThreadRepository implements ThreadRepositoryInterface
{
    private $threadModel;
    private $threadsArtistsModel;

    public function __construct(ThreadModel $threadModel, ThreadsArtistsModel $threadsArtistsModel)
    {
        $this->threadModel = $threadModel;
        $this->threadsArtistsModel = $threadsArtistsModel;
    }

    public function findAll(): array
    {
        $threads = $this->threadModel->all();
        $threadIds = $threads->pluck("id");
        $threadArtists = $this->threadsArtistsModel->whereIn('thread_id', $threadIds)->get();

        $artistEntities = [];
        foreach ($threadArtists as $threadArtist) {
            $artist = $threadArtist->artist;
            $artistEntities[$threadArtist->thread_id][] = ArtistFactory::create($artist->id, $artist->name, $artist->group, $artist->birthday, $artist->blood_type, $artist->joined_date, $artist->image_path);
        }
        return ThreadFactory::createMultiple($threads, $artistEntities);
    }
}
