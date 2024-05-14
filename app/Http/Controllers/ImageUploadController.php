<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function imageUpload(){
        return view('image-upload');
    }

    public function prosesImageUpload(Request $request){
        $request->validate([
            'nama_berkas' => 'required|string',
            'berkas' => 'required|file|image|max:500',
        ]);
        $ext = $request->berkas->getClientOriginalExtension();
        $textname = $request->nama_berkas.'.'.$ext;

        $path = $request->berkas->move('gambar',$textname);
        $path = str_replace("\\","//",$path);

        $pathBaru = asset('gambar/'.$textname);
        echo "Gambar berhasil di upload ke <a href='$pathBaru'>$textname</a>";
        echo "<br>";
        echo "<img src='$pathBaru' alt='$textname' style='max-width: 500px'; height: auto;'>";
    }
}
