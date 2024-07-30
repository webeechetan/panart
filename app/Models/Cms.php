<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cms extends Model
{
     protected $fillable = [
          'name','slug','description','short_description','meta_title','meta_description',
     ]; 

     public function scopeOrder($query)
     {  	
          return $query->orderBy('id', 'Desc');
     }  

     public function scopeActive($query)
     {  	
          return $query->where('status', '=', 1);
     }
  

}
