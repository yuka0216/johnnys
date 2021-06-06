<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class ProfileFreeWriting
{
    private const MAX_LENGTH = 100;
    private $value;

    public function __construct(?string $value)
    {
        if ($value !== null) {
            if (mb_strlen($value) > self::MAX_LENGTH) {
                throw new Exception("FreeWritingは100文字以内で指定してください");
            }
        }
        $this->value = $value;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
