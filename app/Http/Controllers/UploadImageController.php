<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UploadImage;

class UploadImageController extends Controller
{
   function show(){
		return view("upload_form");
	}
	function upload(Request $request){
		$request->validate([
			'image' => 'required|file|image|mimes:png,jpg'
		]);

		$upload_image = $request->file('image[]');
=======


        $upload_image = array(); //空の配列用意
            for($i=1; $i<=4; $i++){ 
            $file_name = "path".$i; //images_path1～4を準備して$file_nameに代入
                  if(isset($request->$file_name)){ //issetは変数に値がセットされているか確認する方法、つまり$file_nameに'image_path'があるか確認している
                      $files = $request->file($file_name); //file('読み込みたい変数、カラムなど文字列ならok') 
                      $path = $request->$file_name->storeAs('public/image', $file_name.$dt.'.png'); //画像をストレージに保存
                      
                      $item->path = basename($path);
                      $item_photo = new ItemPhoto(); //ItemPhotoインスタンス作成
                      $item_photo->fill(["path"=>$file_name.$dt.'.png']);
                      $item_photos[] = $item_photo; //各item_photoを用意した$item_photosに代入する
                      InterventionImage::make($files)->resize(100, 100)->save(path()."/upload". $item_photo->path);
=======
		$upload_image = $request->file('image');

	
		if($upload_image) {
			//アップロードされた画像を保存する
			$path = $upload_image->store("public");
			//画像の保存に成功したらDBに記録する
			if($path){
				UploadImage::create([
					"file_name" => $upload_image->getClientOriginalName(),
					"file_path" => $path
				]);

			}
		}
		return redirect("/list");
	}
}