<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

interface ArtistRepositoryInterface
{
    public function findAll(): array;
    public function fetchProfilesByGroupName($groupName): array;
    public function fetchProfileBySearch(array $searchWordList): array;
}
