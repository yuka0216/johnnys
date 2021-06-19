<?php

declare(strict_types=1);

namespace Tests\Unit;

use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Domain\Model\ValueObject\ArtistName;
use Domain\Model\ValueObject\Birthday;

class BirthdayTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function valueメソッドが正常に動いていること()
    {
        $expected = new DateTime("1993-02-16");
        $birthday = new Birthday($expected);
        $actual = $birthday->value();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function isBirthdayメソッドが正常に動いていること_誕生日当日の場合()
    {
        $expected = new DateTime("1993-02-16");
        $today = new DateTime("1993-02-16");
        $birthday = new Birthday($expected);
        $actual = $birthday->isBirthday($today);
        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function isBirthdayメソッドが正常に動いていること_年が異なる誕生日の場合()
    {
        $expected = new DateTime("1993-02-16");
        $today = new DateTime("2021-02-16");
        $birthday = new Birthday($expected);
        $actual = $birthday->isBirthday($today);
        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function isBirthdayメソッドが正常に動いていること_誕生日ではない場合()
    {
        $expected = new DateTime("1993-02-16");
        $today = new DateTime("1993-02-10");
        $birthday = new Birthday($expected);
        $actual = $birthday->isBirthday($today);
        $this->assertFalse($actual);
    }
}
