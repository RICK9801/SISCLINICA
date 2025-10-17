<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    public $timestamps = false;

    protected $table = 'citas';

    // Relaciones
    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'paciente_id');
    }

    public function odontologo()
    {
        return $this->belongsTo(Odontologos::class, 'odontologo_id');
    }

    public function tratamiento()
    {
        return $this->belongsTo(Tratamientos::class, 'tratamiento_id');
    }

   public function servcios() {
    return $this->belongsTo(Tratamientos::class, 'tratamiento_id');
}
public function servicio()
{
    return $this->belongsTo(Servicio::class);
}



    // Obtener todos los registros ordenados
    public static function getRecord()
    {
        return self::orderBy('id', 'desc')->get();
    }

    // Obtener un registro por ID
    public static function getSingle($id)
    {
        return self::find($id);
    }
}
