<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MiembroController
 *
 **/

class Miembro extends Model
{
	protected $table = 'miembro';

	/*protected $casts = [
		'tipo_miembro' => 'int',
		'estado_civil' => 'int',
		'tipo_documento' => 'int',
		'mun_naci' => 'int',
		'mun_bautizo' => 'int',
		'escolaridad' => 'int'
	];

	protected $dates = [
		'fecha_naci',
		'fecha_bautizo',
		'fecha_espiritu'
	];*/

	protected $fillable = [
		'tipo_miembro',
		'estado_civil',
		'nombres',
		'apellidos',
		'tipo_documento',
		'documento',
		'fecha_naci',
		'mun_naci',
		'ocupacion_actual',
		'direccion_corresp',
		'telefono',
		'celular',
		'correo',
		'fecha_bautizo',
		'mun_bautizo',
		'pastor_bautizo',
		'fecha_espiritu',
		'observaciones',
		'escolaridad',
		'profesion',
		'conyuge',
        'foto',
        'firma',
        'concepto_recibido'
	];

	public function mun_naci(){
	    return $this->belongsTo(Municipio::class, 'mun_naci');
    }

    public function escolaridad(){
	    return $this->belongsTo(TipoEstudio::class, 'escolaridad');
    }

	public function estado_civil()
	{
		return $this->belongsTo(EstadoCivil::class, 'estado_civil');
	}

	public function mun_bautizo()
	{
		return $this->belongsTo(Municipio::class, 'mun_bautizo');
	}

	public function tipo_documento()
	{
		return $this->belongsTo(TipoDocumento::class, 'tipo_documento');
	}

	public function tipo_estudio()
	{
		return $this->belongsTo(TipoEstudio::class, 'escolaridad');
	}

	public function tipo_miembro()
	{
		return $this->belongsTo(TipoMiembro::class, 'tipo_miembro');
	}

	public function adjuntos()
	{
		return $this->hasMany(Adjunto::class, 'miembro');
	}

	public function cargos(){
	    return $this->hasMany(CargosMiembro::class, 'miembro');
    }

	public function congregacions()
	{
		return $this->belongsToMany(Congregacion::class, 'congregacion_miembro', 'miembro', 'congregacion')
					->withPivot('id', 'fecha_ingreso', 'fecha_salida');
	}

	public function ninios()
	{
		return $this->hasMany(Ninio::class, 'padre');
	}
}
