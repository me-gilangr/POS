<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelasiBarangSupplier extends Model
{
    use SoftDeletes;
    protected $table = 'T10_RLS_BRG_SUPP';
}
