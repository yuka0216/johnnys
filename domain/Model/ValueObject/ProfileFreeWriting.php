<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class ProfileFreeWriting
{
    private const MAX_LENGTH = 20;
    private $value;

    public function __construct(?string $value)
    {
        if (mb_strlen($value) > self::MAX_LENGTH) {
            throw new Exception("FreeWritingは20文字以内で指定してください");
        }
        $this->value = $value;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
