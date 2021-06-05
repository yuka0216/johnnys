<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ThreadArtistId;
use Domain\Model\ValueObject\ThreadId;
use Domain\Model\ValueObject\ThreadName;

final class Thread
{
    private $id;
    private $name;
    private $artists;

    public function __construct(ThreadId $id, ThreadName $name, array $artists)
    {
        $this->id = $id;
        $this->name = $name;
        $this->artists = $artists;
    }

    public function id(): ThreadId
    {
        return $this->id;
    }

    public function name(): ThreadName
    {
        return $this->name;
    }

    public function artists(): array
    {
        return $this->artists;
    }

    public function equals(ThreadId $threadId): bool
    {
        return ($this->id()::class === $threadId::class
            && $this->id()->value() === $threadId->value());
    }
}
