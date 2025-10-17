<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
   public $timestamps = false;

    // Definir los campos que se pueden asignar masivamente
    // protected $fillable = [
    //     'paciente_id', 'odontologo_id', 'tratamiento_id', 
    //     'fecha_servicio', 'monto_total', 'monto_pagado', 
    //     'saldo_restante', 'metodo_pago', 'estado_pago'
    // ];

    public function tratamientos(){
        return $this->belongsTo(Tratamientos::class,'tratamiento_id');
        }//RALIMIT: ESTA EN MODEL RELACIONES DE TABLA

    public function pacientes(){
            return $this->belongsTo(pacientes::class,'paciente_id');
            }//RALIMIT: ESTA EN MODEL RELACIONES DE TABLA

    public function odontologos(){
                return $this->belongsTo(odontologos::class,'odontologo_id');
                }//RALIMIT: ESTA EN MODEL RELACIONES DE TABLA







                
    public static function getRecord()
    {
        return self::orderBy('id', 'desc')->get();
    }

    // Si deseas habilitar la búsqueda de un solo registro
    static public function getSingle($id)
    {
        return self::find($id);
    }
}
