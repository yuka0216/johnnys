<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

use Exception;

class UserId
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new Exception("Idは1以上を指定してください");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
