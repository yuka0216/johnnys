<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ArtistBloodType;

class Post
{
    private $id;
    private $name;
    private $group;
    private $birthday;
    private $bloodType;
    private $joinedDate;
    private $imagePath;

    public function __construct(ArtistId $id, ArtistName $name, ArtistGroup $group, date $birthday, ArtistBloodType $bloodType, date $joinDate, str $imagePath)
    {
        $this->id = $id;
        $this->name = $name;
        $this->group = $group;
        $this->birthday = $birthday;
        $this->bloodType = $bloodType;
        $this->joinedDate = $joinDate;
        $this->imagePath = $imagePath;
    }
}
