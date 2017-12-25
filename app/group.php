<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = [
		'name',
		'label',
		'description',
        'group_id'
	];

    public function users ()
    {
        return $this->hasMany('App\User');
    }

    public function Group()
    {
        return $this->belongsTo(Group::class);
    }
}
