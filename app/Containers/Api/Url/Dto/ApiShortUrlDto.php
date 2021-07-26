<?php

namespace App\Containers\Api\Url\Dto;

use App\Interfaces\BaseDto;

class ApiShortUrlDto extends BaseDto
{

    public string $hash;
    public string $url;
    public ?string $data;
    public bool $active;


    function dto(): self
    {
        return new self();
    }


    public function fillFromHash(string $hash): self
    {
        $dto = $this->dto();

        $dto->hash = $hash;

        return $dto;
    }

}
