<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ProfileFavorite;
use Domain\Model\ValueObject\ProfileFreeWriting;
use Domain\Model\ValueObject\ProfileId;
use Domain\Model\ValueObject\ProfileImagePath;
use Domain\Model\ValueObject\ProfileName;
use Domain\Model\ValueObject\ProfileUserId;

final class Profile
{
    private $id;
    private $userId;
    private $name;
    private $favorite;
    private $freeWriting;
    private $imagePath;

    public function __construct(?ProfileId $id, ?ProfileUserId $userId, ?ProfileName $name, ?ProfileFavorite $favorite, ?ProfileFreeWriting $freeWriting,  ?ProfileImagePath $imagePath)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->favorite = $favorite;
        $this->freeWriting = $freeWriting;
        $this->imagePath = $imagePath;
    }

    public function id(): ?ProfileId
    {
        return $this->id;
    }
    public function userId(): ?ProfileUserId
    {
        return $this->userId;
    }
    public function name(): ?ProfileName
    {
        return $this->name;
    }

    public function favorite(): ?ProfileFavorite
    {
        return $this->favorite;
    }
    public function freeWriting(): ?ProfileFreeWriting
    {
        return $this->freeWriting;
    }
    public function imagePath(): ?ProfileImagePath
    {
        return $this->imagePath;
    }
}
