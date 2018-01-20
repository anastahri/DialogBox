<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Public_message extends Model
{
    protected $fillable = ['message'];
    
    public function User () 
    {
    	return $this->belongsTo('App\User');
    }

    public function Time ()
    {
		if ($this->updated_at->diffInMinutes(Carbon::now())<60)
			return $this->updated_at->diffForHumans();
		elseif ($this->updated_at->isToday())
			return $this->updated_at->format('H:i');
		elseif ($this->updated_at->isYesterday())
			return "Yesterday";
		else
			return $this->updated_at->format('d/m/y');
    }
}