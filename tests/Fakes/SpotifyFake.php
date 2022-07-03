<?php

namespace Tests\Fakes;

use App\Http\Gateway\Gateway;

class SpotifyFake implements Gateway
{
    public function getToken()
    {
        return 'BQAhVAtb0smRGUUNpJFGZBqNOaepBHXJdRZk0f-H78veM41o1Um-Z2JIiOgrSNDQP7Tr-sr7sxpq0a0dEBI';
    }

    public function getBandId($access_token, $query)
    {
        if($query == "doesnt+exist"){
            return null;
        }
        return '0SnyKkoyBaB2fG8IJH4xmU';
    }

    public function getAlbums($access_token, $id)
    {
        return json_decode(
            "[{\"id\": \"2UWwSvdLSntNblYm32f6aN\",\"images\": [{\"height\": 640,\"url\": \"https://i.scdn.co/image/ab67616d0000b27337f5fca7fd3211cfb63e683a\",\"width\": 640}],\"name\": \"Civilización\",\"release_date\": \"2007-08-07\",\"total_tracks\": 13},{\"id\": \"2UWwSvdLSntNblYm32f6aN\",\"images\": [{\"height\": 640,\"url\": \"https://i.scdn.co/image/ab67616d0000b27337f5fca7fd3211cfb63e683a\",\"width\": 640}],\"name\": \"CivilizaciónDos\",\"release_date\": \"2007-08-07\",\"total_tracks\": 13}]", true);
    }
}
