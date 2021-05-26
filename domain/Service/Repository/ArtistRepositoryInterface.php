<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

interface ArtistRepositoryInterface
{
    public function findAll(): array;
    public function fetchProfileBySearch(array $searchWordList): array;
    // public static function makeSearchWordList(Request $request): array
    // public static function makeEntity($targetArtistList): array
    // static functionはインターフェースに記載はいらない？
}
