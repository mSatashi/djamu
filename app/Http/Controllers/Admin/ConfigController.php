<?php

namespace App\Http\Controllers\Admin;

use SweetAlert;
use App\Models\Web;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function index()
    {
        $web = Web::findOrFail(1);
        return view('admin.website')->with('web', $web);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
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
        }

        // Update Database
        $web = Web::find(1);
        $web->nama_web = $request->input('nama_web');
        $web->tentang = $request->input('tentang');
        if($request->hasFile('gambar_tentang')){
            $web->gambar_tentang = $fileNameToStore;
        }
        if($request->hasFile('logo')){
            $web->logo = $fileNameToStore2;
        }
        $web->email = $request->input('email');
        $web->instagram = $request->input('instagram');
        $web->whatsapp = $request->input('whatsapp');
        $web->twitter = $request->input('twitter');
        $web->youtube = $request->input('youtube');
        $web->facebook = $request->input('facebook');
        $web->user_id = 1;
        $web->save();

        return redirect('admin/website')->with('success', 'Website anda berhasil diubah!');
    }
}
