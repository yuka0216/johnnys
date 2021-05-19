<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class UserName
{
    private const MAX_LENGTH = 20;
    private $value;

    public function __construct(str $value)
    {
        if ($value > self::MAX_LENGTH) {
            throw new Exception("nameは20文字以内の値を指定してください");
        }
        $this->value = $value;
    }

    public function value(): str
    {
        return $this->value;
    }
}
