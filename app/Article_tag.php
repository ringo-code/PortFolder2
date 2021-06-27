<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article_tag extends Model
{
    use HasFactory;
    
    //Postの外部キー認証
     public function posts() 
     {
      return $this->belongsTo('App\Post');
     }
     
    //tagの外部キー認証
     public function tags() 
     {
      return $this->belongsTo('App\Tag');
     }

}