<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class ProfileName
{
    private const MAX_LENGTH = 50;
    private $value;

    public function __construct(?string $value)
    {
        if (mb_strlen($value) > self::MAX_LENGTH) {
            throw new Exception("nameは50文字以内の値を指定してください");
        }
        $this->value = $value;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
