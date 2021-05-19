<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class ProfileName
{
    private const MAX_LENGTH = 10;
    private $value;

    public function __construct(str $value)
    {
        if ($value > self::MAX_LENGTH) {
            throw new Exception("nameは10文字以内の値を指定してください");
        }
        $this->value = $value;
    }

    public function value(): str
    {
        return $this->value;
    }
}
