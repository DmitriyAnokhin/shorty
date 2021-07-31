<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Exception;

abstract class BaseDto
{

    abstract function dto();


    public function fillFromRequest(Request $request)
    {
        return $this->fillFromArray($this->dto(), $request->toArray());
    }


    /**
     * @throws Exception
     */

    public function instanceTransform(string $target)
    {
        $target = new $target();

        if (is_object($target)) {

            return $this->fillFromObject($target, $this);
        }

        throw new Exception('DTO target is not object', 500);
    }


    public function fillFromArray($dto, array $array)
    {
        foreach ($array as $k => $v) {

            $dto->$k = $v;
        }

        return $dto;
    }


    public function fillFromObject($dto, object $object)
    {
        foreach ($object as $k => $v) {

            $dto->$k = $v;
        }

        return $dto;
    }

}
