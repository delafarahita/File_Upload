<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        $request->validate([
            'nama_berkas' => 'required|string',
            'berkas' => 'required|file|image|max:500',
        ]);
        //$path = $request->berkas->store('uploads');
        $ext = $request->berkas->getClientOriginalExtension();
        $textname = $request->nama_berkas.'.'.$ext;
        //$namaFile = 'web-'.time().'.'.$textfile;
        //$namaFile = $textfile;

        $path = $request->berkas->move('gambar',$textname);
        $path = str_replace("\\","//",$path);
        //echo "Variabel path berisi: $path <br>";

        $pathBaru = asset('gambar/'.$textname);
        //echo "proses upload berhasil, data disimpan pada: $path";
        //echo "<br>";
        echo "Gambar berhasil di upload ke <a href='$pathBaru'>$textname</a>";
        //echo $request->berkas->getClientOriginalName()." lolos validasi";
        //dump($request->berkas);
        //return "Pemrosesan file upload di sini";

        // if($request->hasFile('berkas')){
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSizes(): ".$request->berkas->getSize();
        // }
        // else{
        //     echo "Tidak ada berkas yang diupload";
        // }

    }
}
