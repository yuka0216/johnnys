<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class UserPassword
{
    private $value;

    public function __construct(str $value)
    {
    }

    public function value(): str
    {
        return $this->value;
    }
}
