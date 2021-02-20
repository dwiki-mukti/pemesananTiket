<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rute extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
    public function transportasi(){
    	return $this->belongsTo('App\Transportasi');
    }

    public function user()
    {
    	return $this->belongsToMany('App\User')->withPivot(['kode','nomer_kursi']);
    }
}
