<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ThreadArtistId;
use Domain\Model\ValueObject\ThreadId;
use Domain\Model\ValueObject\ThreadName;

final class Thread
{
    private $id;
    private $name;
    private $artistId;

    public function __construct(ThreadId $id, ThreadName $name, ThreadArtistId $artistId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->artistId = $artistId;
    }

    public function id(): ThreadId
    {
        return $this->id;
    }

    public function name(): ThreadName
    {
        return $this->name;
    }

    public function artistId(): ThreadArtistId
    {
        return $this->artistId;
    }
}
