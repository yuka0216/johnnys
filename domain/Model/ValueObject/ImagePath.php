<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

final class ImagePath
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
