<?php

namespace App\Models\User;

use App\Models\BaseModelTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{

    use Authenticatable, Authorizable, HasFactory;
    use BaseModelTrait;


    protected $fillable = [
        'name',
        'email',
    ];

    protected $hidden = [
        'password',
    ];

}
