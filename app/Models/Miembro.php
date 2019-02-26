<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MiembroController
 * 
 * @property int $id
 * @property int $tipo_miembro
 * @property int $estado_civil
 * @property string $nombres
 * @property string $apellidos
 * @property int $tipo_documento
 * @property string $documento
 * @property \Carbon\Carbon $fecha_naci
 * @property int $mun_naci
 * @property string $ocupacion_actual
 * @property string $direccion_corresp
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 * @property \Carbon\Carbon $fecha_bautizo
 * @property int $mun_bautizo
 * @property string $pastor_bautizo
 * @property \Carbon\Carbon $fecha_espiritu
 * @property string $observaciones
 * @property int $escolaridad
 * @property string $profesion
 * @property string $conyuge
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Municipio $municipio
 * @property \App\Models\TipoEstudio $tipo_estudio
 * @property \Illuminate\Database\Eloquent\Collection $adjuntos
 * @property \Illuminate\Database\Eloquent\Collection $cargos
 * @property \Illuminate\Database\Eloquent\Collection $congregacions
 * @property \Illuminate\Database\Eloquent\Collection $ninios
 *
 * @package App\Models
 */
class Miembro extends Eloquent
{
	protected $table = 'miembro';

	protected $casts = [
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
	];

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
		'conyuge'
	];

	public function estado_civil()
	{
		return $this->belongsTo(EstadoCivil::class, 'estado_civil');
	}

	public function municipio()
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

	public function cargos()
	{
		return $this->belongsToMany(Cargo::class, 'cargos_miembro', 'miembro', 'cargo')
					->withPivot('id');
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
