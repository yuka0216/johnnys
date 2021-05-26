<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Image as ImageModel;
use Domain\Model\Entity\Image;
use Domain\Model\ValueObject\ImagePostId;
use Domain\Model\ValueObject\ImagePath;
use Domain\Model\ValueObject\ImageId;
use Domain\Service\Repository\ImageRepositoryInterface;

final class ImageRepository implements ImageRepositoryInterface
{
    private $imageModel;

    public function __construct(ImageModel $imageModel)
    {
        $this->imageModel = $imageModel;
    }

    public function findAll(): array
    {
        $images = $this->imageModel->all();
        $imageEntities = self::makeEntities($images);
        return $imageEntities;
    }

    public static function makeEntities($images): array
    {
        $imageEntities = [];
        foreach ($images as $image) {
            $imageEntities[] = new Image(
                new ImageId($image->id),
                new ImagePath($image->image_path),
                new ImagePostId($image->post_id)
            );
        }
        return $imageEntities;
    }
}
