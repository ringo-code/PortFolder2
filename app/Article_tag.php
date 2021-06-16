<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article_tag extends Model
{
    use HasFactory;
    
    //articleの外部キー認証
     public function articles() 
     {
      return $this->belongsTo('App\Article');
     }
     
    //articleの外部キー認証
     public function tags() 
     {
      return $this->belongsTo('App\Tag');
     }

}