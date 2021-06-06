<?php

declare(strict_types=1);

namespace Domain\Model\Factory;

use Domain\Model\Entity\Image;
use Domain\Model\ValueObject\ImageId;
use Domain\Model\ValueObject\ImagePath;
use Domain\Model\ValueObject\ImagePostId;
use Illuminate\Database\Eloquent\Collection;

class ImageFactory
{
    public static function create(int $id, string $imagePath, int $postId): Image
    {
        return new Image(
            new ImageId($id),
            new ImagePath($imagePath),
            new ImagePostId($postId)
        );
    }

    public static function createMultiple(Collection $imageParams): array
    {
        $imageEntities = [];
        foreach ($imageParams as $imageParam) {
            $imageEntities[] = self::create($imageParam->id, $imageParam->image_path, $imageParam->post_id);
        }
        return $imageEntities;
    }
}
