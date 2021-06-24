<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
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

    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
    ];

    public function getPaginate()
    {
        return $this->orderBy('updated_at','DESC')->paginate();
    }
    

    public function getPaginateByLimit(int $limit_count = 5)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    } 

}