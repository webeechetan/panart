<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    protected $fillable = [ 'name','image' ];

    public function scopeOrder($query)
    {  	
       return $query->orderBy('id', 'Desc');
    }
  
    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

}
