<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailpobeli extends Model
{
    use SoftDeletes;
    protected $table = 'T20_D_PO_BELI';
}
