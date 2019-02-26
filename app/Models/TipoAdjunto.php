<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TipoAdjunto
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $adjuntos
 *
 * @package App\Models
 */
class TipoAdjunto extends Eloquent
{
	protected $table = 'tipo_adjunto';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function adjuntos()
	{
		return $this->hasMany(Adjunto::class, 'tipo_adjunto');
	}
}
