<?php

namespace App\Containers\Url\Dto;

use App\Interfaces\BaseDto;

class ShortUrlDto extends BaseDto
{

    public string $hash;
    public string $url;
    public ?string $data;
    public bool $active;


    function dto(): self
    {
        return new self();
    }

}
