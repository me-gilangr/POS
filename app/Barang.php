<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
	protected $table = 'T00_M_BRG';
	protected $primaryKey = 'FK_BRG';
	public $incrementing = false;
	
	use SoftDeletes;

	protected $fillable = [
		'FK_BRG', 'FN_BRG'
	];
}
