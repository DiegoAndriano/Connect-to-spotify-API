<?php

namespace Tests\Unit;

use App\DTO\Album;
use App\UseCases\ConvertJsonAlbumsToAlbumObjects;
use Tests\Fakes\SpotifyFake;
use Tests\TestCase;

class ConvertJsonAlbumsToAlbumObjectsTest extends TestCase
{
    /** @test */
    public function it_converts()
    {
        $gateway = new SpotifyFake();

        $access_token = $gateway->getToken();
        $id = $gateway->getBandId($access_token, "Los+Piojos");
        $items = $gateway->getAlbums($access_token, $id);

        $processed = (new ConvertJsonAlbumsToAlbumObjects($items))->handle();

        $this->assertInstanceOf(Album::class, $processed->first());
        $this->assertInstanceOf(Album::class, $processed->last());
        $this->assertEquals('Civilización', $processed->first()->name);
        $this->assertEquals('CivilizaciónDos', $processed->last()->name);

    }
}
