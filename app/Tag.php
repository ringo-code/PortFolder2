<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    
     //article_tagの外部キー設定
     public function article_tags() //関数名は複数形がベスト
     {
      return $this->hasMany('App\Article_tag');
     }
     
}