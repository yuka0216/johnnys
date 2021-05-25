<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

use App\Adapter\Repository\ImageRepository;
use App\Adapter\Repository\ProfileRepository;
use Domain\Model\ValueObject\PostThreadId;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function findAll(PostThreadId $threadId, ImageRepository $imageRepository, ProfileRepository $profileRepository): array;
    //PostThreadId型の$threadIdを入れるとarrayを返してくれる

    public function findTargetPost(Request $request, ImageRepository $imageRepository, ProfileRepository $profileRepository): object;
}
