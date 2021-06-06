<?php

declare(strict_types=1);

namespace Domain\Service\Repository;

use Domain\Model\Entity\Profile;
use Domain\Model\ValueObject\UserId;

interface ProfileRepositoryInterface
{
    public function findTargetProfile(UserId $userId): ?Profile;
}
