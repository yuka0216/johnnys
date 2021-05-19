<?php

declare(strict_types=1);
//厳重な型検査を適用。ファイル単位。
// 冒頭で declare(strict_types=1) が使われたファイル内での関数呼び出しにのみ、適用

namespace Domain\Model\ValueObject;

use Exception;

class ArtistBloodType
{
    private const MAX_LENGTH = 2;
    private $value;

    public function __construct(str $value)
    {
        if (mb_strlen($value) > self::MAX_LENGTH) {
            throw new Exception("BloodTypeは2文字以内の値を指定してください");
        }
        if (!ctype_alpha($value)) {
            throw new Exception("BloodTypeはローマ字の値を指定してください");
        }
        if (!ctype_upper($value)) {
            throw new Exception("BloodTypeは大文字の値を指定してください");
        }

        $this->value = $value;
    }

    public function value(): str
    {
        return $this->value;
    }
}
