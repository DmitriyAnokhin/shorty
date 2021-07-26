<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Exception;

abstract class BaseDto
{

    abstract function dto();


    public function fillFromRequest(Request $request): self
    {
        $dto = $this->dto();

        foreach ($request->toArray() as $k => $v) {

            $dto->$k = $v;
        }

        return $dto;
    }


    public function instanceTransform($target)
    {
        if (is_string($target)) {
            $target = new $target();
        }

        if (is_object($target)) {

            foreach ($this as $k => $v) {
                $target->$k = $v;
            }

            return $target;
        }

        throw new Exception('DTO target is not object', 500);
    }

}
