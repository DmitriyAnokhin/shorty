<?php

namespace App\Models\Url;

use App\Models\BaseModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShortUrl extends Model
{

    use SoftDeletes;
    use BaseModelTrait;


    protected $table = 'short_urls';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'hash',
        'url',
        'data',
        'active',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    protected $appends = [
        'short_url',
    ];

    /*
     * ACCESSORS
     */

    public function getShortUrlAttribute(): string
    {
        return self::getBaseUrl() . $this->hash;
    }


    public static function getBaseUrl(): string
    {
        return env('BASE_URL');
    }

}
