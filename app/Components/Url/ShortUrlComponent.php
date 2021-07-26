<?php

namespace App\Components\Url;

use App\Repositories\Url\ShortUrlRepository;

class ShortUrlComponent
{

    protected ShortUrlRepository $shortUrlRepository;


    public function __construct()
    {
        $this->shortUrlRepository = new ShortUrlRepository();
    }


    public function getHash(): string
    {
        while (true) {

            $hash = $this->generateHash();

            if (!$this->shortUrlRepository->hashExists($hash)) {

                break;
            }
        }

        return $hash;
    }


    public function generateHash(): string
    {
        // 62 ^ 6 = 56.800.235.584 уникальных хешей
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $hash = '';

        for ($i = 0; $i < 6; $i++) {

            $char = $chars[mt_rand(0, strlen($chars) - 1)];
            $hash .= $char;
        }

        return $hash;
    }

}

