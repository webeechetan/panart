<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    public $table = 'newsletter';
    protected $fillable = [
        'email' 
   ]; 
   public function scopeOrder($query)
   {  	
    return $query->orderBy('id', 'Desc');
   }
}
