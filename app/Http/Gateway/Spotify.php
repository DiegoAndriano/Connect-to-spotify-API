<?php

namespace App\Http\Gateway;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class Spotify implements Gateway
{

    private $baseUrl = "https://api.spotify.com/v1";

    private function getHeaders($access_token)
    {
        return [
            "Authorization" => "Bearer $access_token",
            "Content-Type" => "application/json",
        ];
    }

    public function getToken()
    {
        $bearer = base64_encode(config('app.SPOTIFY_CLIENT_ID') . ':' . config('app.SPOTIFY_CLIENT_SECRET'));

        $req = Http::asForm()->withHeaders([
            "Authorization" => "Basic $bearer",
            "Content-Length" => "0",
        ])
            ->post("https://accounts.spotify.com/api/token", ["grant_type" => "client_credentials"]);

        $req = json_decode($req->body(), true);

        return $req['access_token'];
    }

    public function getBandId($access_token, $query)
    {
        $req = Http::acceptJson()->withHeaders($this->getHeaders($access_token))
            ->get("$this->baseUrl/search?q=$query&type=artist");

        $req = json_decode($req->body(), true);

        if(count($req['artists']['items']) === 0){
            return null;
        }

        return $req['artists']['items'][0]['id'];
    }

    public function getAlbums($access_token, $id)
    {
        $req = Http::acceptJson()->withHeaders($this->getHeaders($access_token))
            ->get("$this->baseUrl/artists/$id/albums");

        $req = json_decode($req->body(), true);

        return $req['items'];
    }
}
