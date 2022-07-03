<?php

namespace App\UseCases;

use App\DTO\Album;
use App\DTO\Cover;

class ConvertJsonAlbumsToAlbumObjects implements BasicUseCase {

    public $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function handle()
    {
        return collect($this->items)
            ->map(function($item){
                $cover = new Cover($item['images'][0]['width'], $item['images'][0]['height'], $item['images'][0]['url']);
                return new Album($item['name'], $item['release_date'], $item['total_tracks'], $cover);
            });
    }
}
