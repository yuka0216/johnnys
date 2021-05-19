<?php

declare(strict_types=1);
//厳重な型検査を適用。ファイル単位。
// 冒頭で declare(strict_types=1) が使われたファイル内での関数呼び出しにのみ、適用

namespace Domain\Model\ValueObject;

use Exception;

class PostComment
{
    private const MAX_LENGTH = 100;
    private $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new Exception("PostCommentは必須入力です");
        }
        if (mb_strlen($value) > self::MAX_LENGTH) {
            throw new Exception("コメントは100文字以内で入力してください");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
