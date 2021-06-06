<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Image as ImageModel;
use Domain\Model\Factory\ImageFactory;
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
        return ImageFactory::createMultiple($images);
    }
}
