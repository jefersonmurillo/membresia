<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Municipio
 * 
 * @property int $id
 * @property string $num_municipio
 * @property int $departamento_id
 * @property string $municipio
 * 
 * @property \App\Models\Departamento $departamento
 * @property \Illuminate\Database\Eloquent\Collection $miembros
 *
 * @package App\Models
 */
class Municipio extends Eloquent
{
	protected $table = 'municipio';
	public $timestamps = false;

	protected $casts = [
		'departamento_id' => 'int'
	];

	protected $fillable = [
		'num_municipio',
		'departamento_id',
		'municipio'
	];

	public function departamento()
	{
		return $this->belongsTo(Departamento::class);
	}

	public function miembros()
	{
		return $this->hasMany(Miembro::class, 'mun_bautizo');
	}
}
