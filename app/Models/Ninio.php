<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 22 Feb 2019 18:34:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ninio
 * 
 * @property int $id
 * @property int $padre
 * 
 * @property \App\Models\Miembro $miembro
 *
 * @package App\Models
 */
class Ninio extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'padre' => 'int'
	];

	protected $fillable = [
		'padre'
	];

	public function miembro()
	{
		return $this->belongsTo(Miembro::class, 'padre');
	}
}
