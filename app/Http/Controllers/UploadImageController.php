<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UploadImage;

class UploadImageController extends Controller
{
	    public function index(Image $upload_image) {
        $upload_images = $upload_image->get();
        //dd($upload_images);
        return view('index')->with(['upload_images' => $upload_images]);
    }

    	public function store(Request $request, Image $upload_image) {
        $files = $request->file('file');
        foreach($files as $file) {
            $filename = $file->getClientOriginalName();
            $file->storeAS('public/test', $filename);
            DB::table('posts')->insert(
                ['path' => $filename]
            );
        }

		return redirect("/posts/create");
	   }
	     public function show(Image $upload_image) {
        
        	return view('show')->with(['image' => $upload_image]);
    }
  }