<?php

declare(strict_types=1);
//厳重な型検査を適用。ファイル単位。
// 冒頭で declare(strict_types=1) が使われたファイル内での関数呼び出しにのみ、適用

namespace Domain\Model\ValueObject;

use Exception;

class ArtistGroup
{
    private const MAX_LENGTH = 10;
    private $value;

    public function __construct(string $value)
    {
        if (mb_strlen($value) > self::MAX_LENGTH) {
            throw new Exception("Groupは10字以内の値を指定してください");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
