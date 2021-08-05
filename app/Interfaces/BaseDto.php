<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Exception;

abstract class BaseDto
{

    abstract function dto();


    public function fillFromRequest(Request $request)
    {
        return $this->fillFromArray($request->toArray());
    }


    public function instanceTransform(string $target)
    {
        $target = new $target();

        foreach ($this as $k => $v) {

            $target->$k = $v;
        }

        return $target;
    }


    public function fillFromArray(array $array)
    {
        $dto = $this->dto();
        
        foreach ($array as $k => $v) {

            $dto->$k = $v;
        }

        return $dto;
    }


    public function fillFromObject(object $object)
    {
        $dto = $this->dto();
        
        foreach ($object as $k => $v) {

            $dto->$k = $v;
        }

        return $dto;
    }

}
