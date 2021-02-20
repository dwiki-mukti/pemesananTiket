<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rute_user extends Model
{
	use SoftDeletes;
    protected $table = 'rute_user';
}
