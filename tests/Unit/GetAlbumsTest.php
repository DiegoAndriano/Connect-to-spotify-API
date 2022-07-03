<?php

namespace Tests\Unit;

use App\UseCases\GetAlbums;
use Tests\Fakes\SpotifyFake;
use Tests\TestCase;

class GetAlbumsTest extends TestCase
{
    /** @test */
    public function it_gets_albums()
    {
        $expect = json_decode(
            "[{\"id\": \"2UWwSvdLSntNblYm32f6aN\",\"images\": [{\"height\": 640,\"url\": \"https://i.scdn.co/image/ab67616d0000b27337f5fca7fd3211cfb63e683a\",\"width\": 640}],\"name\": \"Civilización\",\"release_date\": \"2007-08-07\",\"total_tracks\": 13},{\"id\": \"2UWwSvdLSntNblYm32f6aN\",\"images\": [{\"height\": 640,\"url\": \"https://i.scdn.co/image/ab67616d0000b27337f5fca7fd3211cfb63e683a\",\"width\": 640}],\"name\": \"CivilizaciónDos\",\"release_date\": \"2007-08-07\",\"total_tracks\": 13}]",
            true
        );

        $gateway = new SpotifyFake();

        $handler = new GetAlbums($gateway, 'Los Piojos');

        $this->assertEquals($expect, $handler->handle());

    }
}
