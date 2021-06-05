<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ArtistBloodType;
use Domain\Model\ValueObject\ArtistGroup;
use Domain\Model\ValueObject\ArtistId;
use Domain\Model\ValueObject\ArtistImagePath;
use Domain\Model\ValueObject\ArtistName;

final class Artist
{
    private $id;
    private $name;
    private $group;
    public $birthday;
    private $bloodType;
    public $joinedDate;
    private $imagePath;

    public function __construct(ArtistId $id, ArtistName $name, ArtistGroup $group, string $birthday, ArtistBloodType $bloodType, string $joinDate, ?ArtistImagePath $imagePath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->group = $group;
        $this->birthday = $birthday;
        $this->bloodType = $bloodType;
        $this->joinedDate = $joinDate;
        $this->imagePath = $imagePath;
    }

    public function id(): ArtistId
    {
        return $this->id;
    }

    public function name(): ArtistName
    {
        return $this->name;
    }

    public function group(): ArtistGroup
    {
        return $this->group;
    }

    public function birthday(): String
    {
        return $this->birthday;
    }

    public function bloodType(): ArtistBloodType
    {
        return $this->bloodType;
    }

    public function joinedDate(): string
    {
        return $this->joinedDate;
    }

    public function imagePath(): ?ArtistImagePath
    {
        return $this->imagePath;
    }
}
