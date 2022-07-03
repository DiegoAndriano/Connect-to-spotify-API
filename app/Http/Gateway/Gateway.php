<?php

namespace App\Http\Gateway;

interface Gateway{
    public function getToken();
    public function getBandId($access_token, $query);
    public function getAlbums($access_token, $id);
}
