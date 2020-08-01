<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
	protected $table = 'T00_M_SATUAN';
	protected $primaryKey = 'FK_SATUAN';
	public $incrementing = false;
	
	use SoftDeletes;

	protected $fillable = [
		'FK_SATUAN', 'FN_SATUAN'
	];
}
