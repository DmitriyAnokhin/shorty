<?php

namespace App\Models;

use Illuminate\Support\Str;

trait BaseModelTrait
{

    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }


    public static function getUuid(): string
    {
        return Str::uuid();
    }


    public static function getDiskLocal(): string
    {
        return 'public';
    }


    public function getFullName(): string
    {
        return trim($this->last_name ?? '' . ' ' . $this->first_name ?? '' . ' ' . $this->middle_name ?? '');
    }

    /*
     * PAGINATE
     */

    public static function getOffset(int $page, int $limit): int
    {
        $offset = ($page - 1) * $limit;

        if ($offset < 0) $offset = 0;

        return $offset;
    }

}
