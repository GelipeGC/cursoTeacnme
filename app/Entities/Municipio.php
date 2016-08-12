<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Municipio;
class Municipio extends Model
{
    protected $table = "municipios";
    protected $fillable = ['name','state_id',];

    public static function municipios($id)
    {
    	return Municipio::where('state_id', '=', $id)->get();
    } 
}
