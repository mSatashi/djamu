<?php

namespace App\Http\Controllers\Admin;

use Auth;
use SweetAlert;
use App\Models\Web;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $web = Web::findOrFail(1);
        return view('admin.jumbotron.index', compact('web'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $web = Web::findOrFail(1);
        return view('admin.jumbotron.create', compact('web'));
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
                'judul' => 'required',
                'isi' => 'required',
                'link' => 'required',
                'gambar' => 'image|nullable|max:1999',
        	]
        );

        //Handle File Upload Gambar
        if($request->hasFile('gambar')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            // Cara Upload ke google ke-1
            $path = $request->file('gambar')->storeAs('public/img/jumbotron', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        // Create Post
        $jumbotron = new Jumbotron;
        $jumbotron->judul = $request->input('judul');
        $jumbotron->isi = $request->input('isi');
        $jumbotron->link = $request->input('link');
        $jumbotron->gambar = $fileNameToStore;
        $jumbotron->user_id = Auth::user()->id;
        $jumbotron->save();

        return redirect('admin/jumbotron')->with('success', 'Jumbotron berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $web = Web::findOrFail(1);
        $jumbotron = Jumbotron::findOrFail($id);
        return view('admin.jumbotron.show', compact('jumbotron', 'web'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $jumbotron = Jumbotron::findOrFail($id);
        return view('admin.jumbotron.edit')->with('jumbotron', $jumbotron);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'judul' => 'required',
                'isi' => 'required',
                'link' => 'required',
                'gambar' => 'image|nullable|max:1999'
            ]
        );

        //Handle File Upload Gambar
        if($request->hasFile('gambar')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            // Cara Upload ke google ke-1
            $path = $request->file('gambar')->storeAs('/', $fileNameToStore);
        }

        // Update Database
        $jumbotron = Jumbotron::find($id);
        $jumbotron->judul = $request->input('judul');
        $jumbotron->isi = $request->input('isi');
        $jumbotron->link = $request->input('link');
        if($request->hasFile('gambar')){
            $jumbotron->gambar = $fileNameToStore;
        }
        $jumbotron->user_id = Auth::user()->id;
        $jumbotron->save();

        return redirect('admin/jumbotron')->with('success', 'Jumbotron anda berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $jumbotron = Jumbotron::find($id);
        $jumbotron->delete();

        return redirect('admin/jumbotron')->with('error', 'Jumbotron anda telah berhasil dihapus!');
    }
}
