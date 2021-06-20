<?php
namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadImage extends Model
 {
	 //postの外部キー認証
     public function posts() 
     {
      return $this->belongsTo('App\Post');
     }
     
	protected $table = "upload_image";
	protected $fillable = ["file_name","file_path"];
 }