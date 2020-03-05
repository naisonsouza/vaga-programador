<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;
    /**
     * A basic feature test Artist Store method.
     *
     * @return void
     */
    public function testArtistStore()
    {
        $this->visit('new-artist')
            ->type('Tony Stark', 'name')
            ->attach('/uploads/ns_logo.png', 'artist_image')
            ->press('Enviar')
            ->seePageIs('/artists');
    }
}
