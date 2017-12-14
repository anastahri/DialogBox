<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Public_message extends Model
{
    protected $fillable = ['message'];
    public function User () 
    {
    	return $this->belongsTo('App\User');
    }
}