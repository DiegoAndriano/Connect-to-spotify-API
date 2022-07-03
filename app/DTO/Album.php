<?php

namespace App\DTO;

class Album
{
    public $name, $released, $tracks, $cover;

    public function __construct($name, $released, $tracks, $cover)
    {
        $this->name = $name;
        $this->released = $released;
        $this->tracks = $tracks;
        $this->cover = $cover;
    }
}
