<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CargosMiembro
 * 
 * @property int $id
 * @property int $miembro
 * @property int $cargo
 * 
 *
 * @package App\Models
 */
class CargosMiembro extends Eloquent
{
	protected $table = 'cargos_miembro';
	public $timestamps = false;

	protected $casts = [
		'miembro' => 'int',
		'cargo' => 'int'
	];

	protected $fillable = [
		'miembro',
		'cargo'
	];

	public function cargo(){
		return $this->belongsTo(Cargo::class, 'cargo');
	}

	public function miembro()
	{
		return $this->belongsTo(Miembro::class, 'miembro');
	}
}
