<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Category extends Model
{
      protected $fillable = [
        'parent_id','name','slug','description','is_featured','sequence','meta_title','meta_description'
    ];
      
      protected $categories; 

    public function __construct() {
        // All the categories, keyed by the id for easy access
        //$this->//->keyBy('id');
    }

  public function scopeOrder($query)
  {  	
    return $query->orderBy('id', 'Desc');
  }  

  public function scopeActive($query)
  {
  	return $query->where('status', '=', 1);
  }
  
  public static function getHierarchy(): array
  {
    return (new self())->getCategories();
  }

  private function getCategories(): array
  {
    $mainCategories = self::where(['parent_id'=>NULL])->get();
    if(count($mainCategories)>0){
      foreach ($mainCategories as $category) {
          $this->categories[] = $category->toArray();
          $this->getParentCategories($category, 0);
      }
    }else{
       $this->categories=array();
    }
    return $this->categories;
  }

  private function getParentCategories($category, $level)
  {
    if($subCategories = $category->hasSubCategories) {
      $level++;
      foreach($subCategories as $subCategory) {
          $subCategory->name = str_repeat('-', $level) . $subCategory->name;
          $this->categories[] = $subCategory->toArray();
          $this->getParentCategories($subCategory, $level);
      }
    }
  }
  public function hasSubCategories()
  {
   return $this->hasMany($this, 'parent_id');
  }
  public function childs() {
    return $this->hasMany('App\Models\Category','parent_id','id') ;
  }
}
