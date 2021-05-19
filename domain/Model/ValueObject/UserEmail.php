<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class UserEmail
{
    private $value;

    public function __construct(str $value)
    {
        if (strpos($value, '@') === false) {
            throw new Exception("@を含んだ値を指定してください");
        }
        $this->value = $value;
    }

    public function value(): str
    {
        return $this->value;
    }
}
