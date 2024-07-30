<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class ProductGallery extends Model
{
      protected $fillable = [
        'product_id','title','thumb_image','image','type','product_type','sku'
      ];

      protected $table = "product_gallery";

  public function scopeStore($query)
  {
      if(Session::get('store_id')!=1)
      return $query->where("store_id",Session::get('store_id'));
  }

  public function scopeOrder($query)
  {  	
       return $query->orderBy('id', 'Desc');
  }
  

  public function scopeActive($query)
  {
  	
       return $query->where('status', '=', 1);
  }

  
    public function product()
  {
     return $this->hasOne('App\Models\Product','id','product_id');
  }
  

}
