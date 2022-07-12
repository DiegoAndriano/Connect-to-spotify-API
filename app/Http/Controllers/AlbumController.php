<?php

namespace App\Http\Controllers;

use App\Http\Gateway\Gateway;
use App\Http\Requests\AlbumRequest;
use App\UseCases\ConvertJsonAlbumsToAlbumObjects;
use App\UseCases\GetAlbums;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;

class AlbumController extends Controller
{
    private $spotify;

    public function __construct(Gateway $spotify)
    {
        $this->spotify = $spotify;
    }

    public function index(AlbumRequest $request)
    {
        $query = Str::of($request->q)->replace(' ', '+');
        $items = (new GetAlbums($this->spotify, $query))->handle();

        if (!$items) {
            return new JsonResponse('No artist found', 404);
        }

        $albums[] = (new ConvertJsonAlbumsToAlbumObjects($items))->handle();

        return new JsonResponse(collect($albums)->flatten());
    }
}
