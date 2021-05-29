<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Profile as ProfileModel;
use Domain\Model\Entity\Profile;
use Domain\Model\ValueObject\ProfileFavorite;
use Domain\Model\ValueObject\ProfileFreeWriting;
use Domain\Model\ValueObject\ProfileId;
use Domain\Model\ValueObject\ProfileImagePath;
use Domain\Model\ValueObject\ProfileName;
use Domain\Model\ValueObject\ProfileUserId;
use Domain\Model\ValueObject\UserId;
use Domain\Service\Repository\ProfileRepositoryInterface;

final class ProfileRepository implements ProfileRepositoryInterface
{
    private $profileModel;

    public function __construct(ProfileModel $profileModel)
    {
        $this->profileModel = $profileModel;
    }

    public function findTargetProfile(UserId $userId)
    {
        $profile = $this->profileModel->where('user_id', $userId->value())->first();
        if ($profile == null) return null;
        $profileEntity = new Profile(
            new ProfileId($profile->id),
            new ProfileUserId($profile->user_id),
            new ProfileName($profile->name),
            new ProfileFavorite($profile->favorite),
            new ProfileFreeWriting($profile->free_writing),
            new ProfileImagePath($profile->profile_image_path),
        );
        return $profileEntity;
    }
}
