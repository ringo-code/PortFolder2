<?php

namespace App;
use App\Article_tag;
use App\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'name',
    ];
    
     //article_tagの外部キー設定
     public function article_tags() //関数名は複数形がベスト
     {
      return $this->hasMany('App\Article_tag');
     
     }
     
}