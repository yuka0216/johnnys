<?php

declare(strict_types=1);

namespace Domain\Model\Factory;

use Domain\Model\Entity\Artist;
use Domain\Model\ValueObject\ArtistBloodType;
use Domain\Model\ValueObject\ArtistGroup;
use Domain\Model\ValueObject\ArtistId;
use Domain\Model\ValueObject\ArtistImagePath;
use Domain\Model\ValueObject\ArtistName;

class ArtistFactory
{
    public static function create(int $id, string $name, string $group, string $birthday, string $bloodType, string $joinedDate, string $imagePath): Artist
    {
        return new Artist(
            new ArtistId($id),
            new ArtistName($name),
            new ArtistGroup($group),
            $birthday,
            new ArtistBloodType($bloodType),
            $joinedDate,
            new ArtistImagePath($imagePath)
        );
    }

    public static function createMultiple($targetArtists): array
    {
        $artistEntities = [];
        foreach ($targetArtists as $targetArtist) {
            $artistEntities[] = self::create($targetArtist->id, $targetArtist->name, $targetArtist->group, $targetArtist->birthday, $targetArtist->blood_type, $targetArtist->joined_date, $targetArtist->image_path);
        }
        return $artistEntities;
    }
}
