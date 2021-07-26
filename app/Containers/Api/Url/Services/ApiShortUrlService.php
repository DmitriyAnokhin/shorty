<?php

namespace App\Containers\Api\Url\Services;

use App\Components\Url\ShortUrlComponent;
use App\Containers\Api\Url\Dto\ApiShortUrlDto;
use App\Models\Url\ShortUrl;
use App\Repositories\Url\ShortUrlDto;
use App\Repositories\Url\ShortUrlRepository;

class ApiShortUrlService
{

    protected ShortUrlComponent $shortUrlComponent;
    protected ShortUrlRepository $shortUrlRepository;


    public function __construct()
    {
        $this->shortUrlComponent = new ShortUrlComponent();
        $this->shortUrlRepository = new ShortUrlRepository();
    }


    public function create(ApiShortUrlDto $dto): ShortUrl
    {
        $shortUrl = $this->shortUrlRepository->readByUrl($dto->url);

        if (!$shortUrl) {

            $dto->hash = $this->shortUrlComponent->getHash();

            // TODO: приведение экземпляров классов ?!
            $dto = $dto->instanceTransform(ShortUrlDto::class);

            $shortUrl = $this->shortUrlRepository->create($dto);
        }

        return $shortUrl;
    }


    public function read(ApiShortUrlDto $dto): string
    {
        $shortUrl = $this->shortUrlRepository->readByHash($dto->hash);

        if (!$shortUrl) {

            $url = $this->shortUrlRepository->getBaseUrl();
        }

        return $url ?? $shortUrl->url;
    }

}
