<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class ProfileImagePath
{
    private $value;

    public function __construct(str $value)
    {
        $this->value = $value;
    }

    public function value(): str
    {
        return $this->value;
    }
}
