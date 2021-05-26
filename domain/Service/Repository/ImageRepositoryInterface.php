<?php

declare(strict_types=1);

namespace Domain\Service\Repository;


interface ImageRepositoryInterface
{
    public function findAll(): array;
    public static function makeEntities($images): array;
}
