<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

interface ThreadRepositoryInterface
{
    public function findAll(): array;
}
