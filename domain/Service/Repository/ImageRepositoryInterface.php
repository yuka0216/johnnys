<?php

declare(strict_types=1);

namespace Domain\Service\Repository;


interface ImageRepositoryInterface
{
    public function findAll(): array;
}
