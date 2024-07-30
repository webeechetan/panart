<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    public $table = 'contact_us';
    protected $fillable = [
        'name','email','mobile','message' 
   ]; 
}
