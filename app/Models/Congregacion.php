<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Congregacion
 * 
 * @property int $id
 * @property string $direccion
 * @property string $barrio
 * @property string $telefono
 * 
 * @property \Illuminate\Database\Eloquent\Collection $miembros
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Congregacion extends Eloquent
{
	protected $table = 'congregacion';
	public $timestamps = false;

	protected $fillable = [
		'direccion',
		'barrio',
		'telefono'
	];

	public function miembros()
	{
		return $this->belongsToMany(Miembro::class, 'congregacion_miembro', 'congregacion', 'miembro')
					->withPivot('id', 'fecha_ingreso', 'fecha_salida');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'congregacion');
	}
}
