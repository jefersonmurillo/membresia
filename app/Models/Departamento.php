<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Departamento
 * 
 * @property int $id
 * @property string $num_departamento
 * @property string $departamento
 * 
 * @property \Illuminate\Database\Eloquent\Collection $municipios
 *
 * @package App\Models
 */
class Departamento extends Eloquent
{
	protected $table = 'departamento';
	public $timestamps = false;

	protected $fillable = [
		'num_departamento',
		'departamento'
	];

	public function municipios()
	{
		return $this->hasMany(Municipio::class);
	}
}
