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
		'FK_BRG', 'FN_BRG','FK_SATUAN','FK_JENIS'
    ];
    
    public function satuan()
    {
        return $this->hasOne('App\Satuan', 'FK_SATUAN','FK_SATUAN');
    }
    public function jenis()
    {
        return $this->hasOne('App\Jenis', 'FK_JENIS','FK_JENIS')->withTrashed();
        // Jadi artinya jenis yang sudah di hapus secara temporary atau status nya di hapus masih bisa di tampilkan 
        // Namun saat input barang lagi tidak bisa pakai jenis yang status nya sudah di-hapus 
    }
}

