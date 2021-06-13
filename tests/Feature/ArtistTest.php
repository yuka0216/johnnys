<?php

namespace Tests\Feature;

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
        $artist = new ArtistName(1);
        $artistName = $artist->value();
        $this->assertEquals(1, $artistName);
    }
}
