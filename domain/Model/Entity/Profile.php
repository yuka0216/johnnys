<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ArtistBloodType;

class Profile
{
    private $id;
    private $userId;
    private $name;
    private $favorite;
    private $freeWriting;
    private $imagePath;

    public function __construct(ProfileId $id, ProfileUserId $userId, ProfileName $name, ProfileFavorite $favorite, ProfileFreeWriting $freeWriting,  ProfileImagePath $imagePath)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->favorite = $favorite;
        $this->freeWriting = $freeWriting;
        $this->imagePath = $imagePath;
    }
}
