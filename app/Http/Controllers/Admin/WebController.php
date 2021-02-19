<?php

namespace App\Http\Controllers\Admin;

use App\Models\Web;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        return view('install.web-config');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, 
            [
                'nama_web' => 'required',
                'tentang' => 'required',
                'email' => 'required',
                'gambar_tentang' => 'image|nullable|max:1999',
                'logo' => 'image|nullable|max:1999'
            ]
        );

        //Handle File Upload Gambar Tentang
        if($request->hasFile('gambar_tentang')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar_tentang')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar_tentang')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            // Cara Upload ke google ke-1
            $path = $request->file('gambar_tentang')->storeAs('public/img/config', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        //Handle File Upload Logo
        if($request->hasFile('logo')){
            // Get filename2 with the extension2
            $filenameWithExt2 = $request->file('logo')->getClientOriginalName();
            // Get just filename2 
            $filename2 = pathInfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename2."_".time().'.'.$extension2;
            // Upload image
            // Cara Upload ke google ke-1
            $path = $request->file('logo')->storeAs('public/img/config', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.png';
        }

        // Create Admin Account
        $web = new Web;
        $web->nama_web = $request->input('nama_web');
        $web->tentang = $request->input('tentang');
        $web->gambar_tentang = $fileNameToStore;
        $web->logo = $fileNameToStore2;
        $web->email = $request->input('email');
        $web->instagram = $request->input('instagram');
        $web->whatsapp = $request->input('whatsapp');
        $web->twitter = $request->input('twitter');
        $web->youtube = $request->input('youtube');
        $web->facebook = $request->input('facebook');
        $web->user_id = 1;
        $web->save();

        return redirect('login')->with('success', 'Website telah berhasil dibuat! Silahkan lakukan konfigurasi pada halaman admin');
    }
}
