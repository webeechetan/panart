<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title','description','image','status','sequence','url','banner_type','thumb_image'
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
