<?php

declare(strict_types=1);
//厳重な型検査を適用。ファイル単位。
// 冒頭で declare(strict_types=1) が使われたファイル内での関数呼び出しにのみ、適用

namespace Domain\Model\ValueObject;

use Exception;

class PostUserId
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new Exception("PostUserIdは1以上を指定してください");
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
