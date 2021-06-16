<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    
    //repostの外部キー設定
     public function reposts() //関数名は複数形がベスト
     {
      return $this->hasMany('App\Repost');
     }
     
     //likeの外部キー設定
     public function likes() //関数名は複数形がベスト
     {
      return $this->hasMany('App\Like');
     }

     //article_tagの外部キー設定
     public function article_tags() //関数名は複数形がベスト
     {
      return $this->hasMany('App\Article_tag');
     }

}