<?php

namespace App\Http\Controllers;

use App\Http\Gateway\Gateway;
use App\Http\Requests\SpotifyRequest;
use App\UseCases\ConvertJsonAlbumsToAlbumObjects;
use App\UseCases\GetAlbums;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    private $spotify;

    public function __construct(Gateway $spotify)
    {
        $this->spotify = $spotify;
    }

    public function index(SpotifyRequest $request)
    {
        $query = Str::of($request->q)->replace(' ', '+');
        $items = (new GetAlbums($this->spotify, $query))->handle();
        $albums[] = (new ConvertJsonAlbumsToAlbumObjects($items))->handle();

        return collect($albums)->flatten()->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
