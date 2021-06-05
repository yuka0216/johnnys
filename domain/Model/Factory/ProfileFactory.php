<?php

declare(strict_types=1);

namespace Domain\Model\Factory;

use Domain\Model\Entity\Profile;
use Domain\Model\ValueObject\ProfileFavorite;
use Domain\Model\ValueObject\ProfileFreeWriting;
use Domain\Model\ValueObject\ProfileId;
use Domain\Model\ValueObject\ProfileImagePath;
use Domain\Model\ValueObject\ProfileName;

class ProfileFactory
{
    public static function create(int $id, string $name, string $favorite, string $freeWriting, string $imagePath): Profile
    {
        return new Profile(
            new ProfileId($id),
            new ProfileName($name),
            new ProfileFavorite($favorite),
            new ProfileFreeWriting($freeWriting),
            new ProfileImagePath($imagePath)
        );
    }
}
