<?php

namespace App\UseCases;


class GetAlbums implements BasicUseCase
{

    public $gateway;
    public $query;

    public function __construct($gateway, $query)
    {
        $this->gateway = $gateway;
        $this->query = $query;
    }

    public function handle()
    {
        $access_token = $this->gateway->getToken();
        $id = $this->gateway->getBandId($access_token, $this->query);
        if (! $id) {
            return null;
        }
        return $this->gateway->getAlbums($access_token, $id);
    }
}
