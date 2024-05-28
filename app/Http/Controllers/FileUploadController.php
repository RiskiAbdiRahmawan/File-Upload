<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }
    public function prosesFileUpload(Request $request)
    {
        // dump($request->berkas);
        // if ($request->hasFile('berkas')) {
        //     echo "path(): " . $request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): " . $request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): " .
        //     $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): " .
        //         $request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): " .
        //     $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): " . $request->berkas->getSize();
        // } else {
        //     echo "Tidak ada berkas yang diupload";
        // }

        // $request->validate([
        //     'berkas' => 'required|file|image|max:5000',
        // ]);

        // echo $request->berkas->getClientOriginalName() . "lolos validasi";

        // $request->validate([
        //     'berkas' => 'required|file|image|max:5000',
        // ]);
        // $extfile = $request->berkas->getClientOriginalName();
        // $namaFile = 'web-' . time() . "." . $extfile;
        // $path = $request->berkas->storeAs('public',$namaFile);
        // // echo "Proses upload berhasil, file berada di: $path";

        // $pathBaru = asset('storage' . $namaFile);
        // echo "Proses upload berhasil,data disimpan pada:$path";
        // echo "<br>";
        // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";

        $request->validate([
            'berkas' => 'required|file|image|max:5000',
        ]);
        $extfile = $request->berkas->getClientOriginalName();
        $namaFile = 'web-' . time() . "." . $extfile;

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        echo "variabel path berisi:$path <br>";

        $pathBaru = asset('gambar/' . $namaFile);
        echo "Proses upload berhasil,data disimpan pada:$path";
        echo "<br>";
        echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
    }
}
