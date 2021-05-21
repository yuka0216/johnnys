<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

use App\Adapter\Repository\ImageRepository;
use Domain\Model\ValueObject\PostThreadId;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function findAll(PostThreadId $threadId, ImageRepository $imageRepository): array;
    //PostThreadId型の$threadIdを入れるとarrayを返してくれる

    public function findTargetPost(Request $request, ImageRepository $imageRepository): object;
}
