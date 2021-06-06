<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Profile as ProfileModel;
use Domain\Model\Entity\Profile;
use Domain\Model\Factory\ProfileFactory;
use Domain\Model\ValueObject\UserId;
use Domain\Service\Repository\ProfileRepositoryInterface;

final class ProfileRepository implements ProfileRepositoryInterface
{
    private $profileModel;

    public function __construct(ProfileModel $profileModel)
    {
        $this->profileModel = $profileModel;
    }

    public function findTargetProfile(UserId $userId): ?Profile
    {
        $profile = $this->profileModel->where('user_id', $userId->value())->first();
        if ($profile == null) return null;
        return ProfileFactory::create($profile->id, $profile->name, $profile->favorite, $profile->free_writing, $profile->profile_image_path);
    }
}
