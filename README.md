# What am i looking at
Small api that connects to spotify's api and returns albums given an artist's name using Laravel.

## How to run

This assumes you've created your own spotify app from https://developer.spotify.com/dashboard/applications and got a client id and client secret

- run ```composer install```
- Copy .env.example and paste as .env
- Fill SPOTIFY_CLIENT_ID and SPOTIFY_CLIENT_SECRET with your own
- run ```php artisan key:generate```
- run ```php artisan serve```

## Check written tutorial in:
http://diegoandriano.com/web-books/connecting-to-spotifys-api
