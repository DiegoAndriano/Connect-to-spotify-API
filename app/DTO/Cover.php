<?php

namespace App\DTO;

class Cover
{
    public $width, $height, $url;

    public function __construct($width, $height, $url)
    {
        $this->width = $width;
        $this->height = $height;
        $this->url = $url;
    }
}
