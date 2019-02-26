<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EstadoCivil
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $miembros
 *
 * @package App\Models
 */
class EstadoCivil extends Eloquent
{
	protected $table = 'estado_civil';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function miembros()
	{
		return $this->hasMany(Miembro::class, 'estado_civil');
	}
}
