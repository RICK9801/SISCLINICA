<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Odontologos extends Model
{
    
    // public $timestamps = false;
    protected $table = 'odontologos';

    public static function getRecord()
    {
        return self::orderBy('id', 'desc')->get();
    }

    public static function getSingle($id)
    {
        return self::find($id);
    }
}
