<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis extends Model
{
	protected $table = 'T00_M_JENIS';
	protected $primaryKey = 'FK_JENIS';
	public $incrementing = false;
	use SoftDeletes;

	protected $fillable = [
		'FK_JENIS', 'FN_JENIS'
	];
}
