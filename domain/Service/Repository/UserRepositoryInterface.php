<?php

declare(strict_types=1);

namespace Domain\Service\Repository;


interface UserRepositoryInterface
{
    public function findAll(): array;
}
