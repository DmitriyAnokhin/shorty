<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

abstract class BaseDto
{

    abstract function dto();


    public function fillFromRequest(Request $request): BaseDto
    {
        $dto = $this->dto();

        foreach ($request->toArray() as $k => $v) {

            $dto->$k = $v;
        }

        return $dto;
    }

}
