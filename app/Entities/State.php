<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;


class State extends Model
{
    protected $table = "states";
    protected $fillable = ['name'];

    
}
