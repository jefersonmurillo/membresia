<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Adjunto
 * 
 * @property int $id
 * @property int $tipo_adjunto
 * @property string $name
 * @property string $url
 * @property int $miembro
 * 
 *
 * @package App\Models
 */
class Adjunto extends Eloquent
{
	protected $table = 'adjunto';
	public $timestamps = false;

	protected $casts = [
		'tipo_adjunto' => 'int',
		'miembro' => 'int'
	];

	protected $fillable = [
		'tipo_adjunto',
		'name',
		'url',
		'miembro'
	];

	public function miembro()
	{
		return $this->belongsTo(Miembro::class, 'miembro');
	}

	public function tipo_adjunto()
	{
		return $this->belongsTo(TipoAdjunto::class, 'tipo_adjunto');
	}
}
