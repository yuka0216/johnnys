<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class ThreadArtistId
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new Exception("threadArtistIdは1以上を指定してください");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
