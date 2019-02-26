<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cargo
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $miembros
 *
 * @package App\Models
 */
class Cargo extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function miembros()
	{
		return $this->belongsToMany(\App\Models\Miembro::class, 'cargos_miembro', 'cargo', 'miembro')
					->withPivot('id');
	}
}
