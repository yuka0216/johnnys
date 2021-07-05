<?php

declare(strict_types=1);
//厳重な型検査を適用。ファイル単位。
// 冒頭で declare(strict_types=1) が使われたファイル内での関数呼び出しにのみ、適用

namespace Domain\Model\ValueObject;

use DateTime;
use Exception;
use Illuminate\Auth\Passwords\DatabaseTokenRepository;
use Illuminate\Support\Facades\Date;

class Birthday
{
    private $value;

    public function __construct(DateTime $value)
    {
        if ($value > $this->getNow()) {
            throw new Exception("誕生日が未来です");
        }
        $this->value = $value;
    }

    public function value(): DateTime
    {
        return $this->value;
    }

    public function isBirthday($today): bool
    {
        return $this->value->format('m/d') === $today->format('m-d');
    }

    public function getNow(): DateTime
    {
        return new DateTime();
    }
}
