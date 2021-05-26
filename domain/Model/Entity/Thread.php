<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ThreadArtistId;
use Domain\Model\ValueObject\ThreadId;
use Domain\Model\ValueObject\ThreadName;

final class Thread
{
    private $id;
    private $name;

    public function __construct(ThreadId $id, ThreadName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): ThreadId
    {
        return $this->id;
    }

    public function name(): ThreadName
    {
        return $this->name;
    }
}
