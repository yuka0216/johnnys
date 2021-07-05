<?php

declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Domain\Model\ValueObject\ArtistName;

class ArtistTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function testExample()
    {
        $artist = new ArtistName("大谷");
        $artistName = $artist->value();
        $this->assertEquals("大谷", $artistName);
    }
}
