<?php

namespace App\Repositories\Url;

use App\Containers\Url\Dto\ShortUrlDto;
use App\Models\Url\ShortUrl;

class ShortUrlRepository
{

    public function create(ShortUrlDto $dto): ShortUrl
    {
        return ShortUrl::create([
            'id' => ShortUrl::getUuid(),
            'hash' => $dto->hash,
            'url' => $dto->url,
            'data' => null,
            'active' => true,
        ]);
    }


    public function readByUrl(string $url): ?ShortUrl
    {
        return ShortUrl::where([
            'url' => $url,
        ])
            ->first();
    }


    public function readByHash(string $hash): ?ShortUrl
    {
        return ShortUrl::where([
            'hash' => $hash,
        ])
            ->first();
    }


    public function hashExists(string $hash): bool
    {
        return ShortUrl::where([
            'hash' => $hash,
        ])
            ->exists();
    }


    public function urlExists(string $url): bool
    {
        return ShortUrl::where([
            'url' => $url,
        ])
            ->exists();
    }


    public function getBaseUrl(): string
    {
        return ShortUrl::getBaseUrl();
    }

}

