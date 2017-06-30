<?php

namespace adminFudea;

use Illuminate\Database\Eloquent\Model;

class Socios extends Model
{
    protected $table='socios';

    protected $primaryKey='idSocio';

    public $timestamps=false;

    protected $fillable =[
    	'idCarrera',
    	'idModalidadPago',
    	'idUser',
    	'egreso',
    	'estadoSuscripcion',
    	'nombre',
    	'apellidoMaterno',
    	'apellidoPaterno',
    	'vencimientoSuscripcion',
        'run',
        'Sexo',
    ];


    #Campos que no queremos que se asignen al modelo (si son especificados).
    protected $guarded = [


    ];
}
