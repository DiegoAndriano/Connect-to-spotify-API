<?php

namespace Tests\Feature;

use App\Http\Controllers\AlbumController;
use Tests\Fakes\SpotifyFake;
use Tests\TestCase;

class AlbumControllerTest extends TestCase
{
    public function set()
    {
        $this->app->bind('App\Http\Controllers\AlbumController', function ($app) {
            return new AlbumController(new SpotifyFake());
        });
    }

    /** @test */
    public function it_works()
    {
        $this->set();
        $band = 'Los+Piojos';

        $this->get('/api/v1/albums?q=' . $band)->assertJson(
            [
                [
                    "name" => "Civilización",
                    "released" => "2007-08-07",
                    "tracks" => 13,
                    "cover" => [
                        "width" => 640,
                        "height" => 640,
                        "url" => "https://i.scdn.co/image/ab67616d0000b27337f5fca7fd3211cfb63e683a"
                    ]
                ],
                [
                    "name" => "CivilizaciónDos",
                    "released" => "2007-08-07",
                    "tracks" => 13,
                    "cover" => [
                        "width" => 640,
                        "height" => 640,
                        "url" => "https://i.scdn.co/image/ab67616d0000b27337f5fca7fd3211cfb63e683a"
                    ]
                ]
            ]
        );;

    }
}
