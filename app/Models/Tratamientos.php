<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tratamientos extends Model
{
    
    public $timestamps = false;
    
    public static function getRecord()
    {
        return self::orderBy('id', 'desc')->get();
    }
    
    static public function getSingle($id)
    {
        //donde estra mi modelo usa el nombre de la tabla significa self
        return self::find($id);
    }
}
