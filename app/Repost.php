<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repost extends Model
{
    use HasFactory;
    
    //Userの外部キー認証
    public function user() 
    {
 	  return $this->belongsTo('App\User');
    }
    
    //articleの外部キー認証
     public function articles() 
     {
      return $this->belongsTo('App\Article');
     }

}