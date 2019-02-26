<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CongregacionMiembro
 * 
 * @property int $id
 * @property int $congregacion
 * @property int $miembro
 * @property \Carbon\Carbon $fecha_ingreso
 * @property \Carbon\Carbon $fecha_salida
 * 
 *
 * @package App\Models
 */
class CongregacionMiembro extends Eloquent
{
	protected $table = 'congregacion_miembro';
	public $timestamps = false;

	protected $casts = [
		'congregacion' => 'int',
		'miembro' => 'int'
	];

	protected $dates = [
		'fecha_ingreso',
		'fecha_salida'
	];

	protected $fillable = [
		'congregacion',
		'miembro',
		'fecha_ingreso',
		'fecha_salida'
	];

	public function congregacion()
	{
		return $this->belongsTo(Congregacion::class, 'congregacion');
	}

	public function miembro()
	{
		return $this->belongsTo(Miembro::class, 'miembro');
	}
}
