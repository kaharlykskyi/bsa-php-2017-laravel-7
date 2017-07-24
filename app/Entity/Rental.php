<?php

namespace App\Entity;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rental extends Authenticatable implements AuthenticatableInterface
{
    public $timestamps = false;

}
