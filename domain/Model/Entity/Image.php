<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ImageId;
use Domain\Model\ValueObject\ImagePath;
use Domain\Model\ValueObject\ImagePostId;

class Image
{
    private $id;
    private $path;
    private $postId;

    public function __construct(ImageId $id, ImagePath $path, ImagePostId $postId)
    {
        $this->id = $id;
        $this->path = $path;
        $this->postId = $postId;
    }

    public function id(): ImageId
    {
        return $this->id;
    }

    public function path(): ImagePath
    {
        return $this->path;
    }

    public function postId(): ImagePostId
    {
        return $this->postId;
    }
}
