<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use SweetAlert;
use App\Models\Web;
use App\Models\User;
use App\Models\JumboSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class JumboSliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $jumboslider = JumboSlider::where('judul', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $jumboslider = JumboSlider::latest()->get();
        }

        $web = Web::findOrFail(1);
        $countJumbo = DB::table('jumbo_sliders')->count();
        $myItem = DB::table('jumbo_sliders')
                    ->join('users', 'jumbo_sliders.user_id', '=', 'users.id')
                    ->select('jumbo_sliders.*', 'users.name')
                    ->latest()
                    ->get();
        return view('admin.jumboslider.index', compact('jumboslider', 'myItem', 'countJumbo', 'web'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $web = Web::findOrFail(1);
        return view('admin.jumboslider.create', compact('web'));
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
                'tulisan_link' => 'required',
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
            $path = $request->file('gambar')->storeAs('public/img/jumboslider', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        // Create JumboSlider
        $jumboslider = new JumboSlider;
        $jumboslider->judul = $request->input('judul');
        $jumboslider->isi = $request->input('isi');
        $jumboslider->tulisan_link = $request->input('tulisan_link');
        $jumboslider->link = $request->input('link');
        $jumboslider->gambar = $fileNameToStore;
        $jumboslider->user_id = Auth::user()->id;
        $jumboslider->save();

        return redirect('admin/jumboslider')->with('success', 'JumboSlider berhasil dibuat!');
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
        $jumboslider = JumboSlider::findOrFail($id);
        $web = Web::findOrFail(1);
        return view('admin.jumboslider.show', compact('jumboslider', 'web'));
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
        $jumboslider = JumboSlider::findOrFail($id);
        $web = Web::findOrFail(1);
        return view('admin.jumboslider.edit', compact('web'))->with('jumboslider', $jumboslider);
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
                'tulisan_link' => 'required',
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
            $path = $request->file('gambar')->storeAs('public/img/jumboslider', $fileNameToStore);
        }

        // Update JumboSlider
        $jumboslider = JumboSlider::find($id);
        $jumboslider->judul = $request->input('judul');
        $jumboslider->isi = $request->input('isi');
        $jumboslider->tulisan_link = $request->input('tulisan_link');
        $jumboslider->link = $request->input('link');
        if($request->hasFile('gambar')){
            $jumboslider->gambar = $fileNameToStore;
        }
        $jumboslider->user_id = Auth::user()->id;
        $jumboslider->save();

        return redirect('admin/jumboslider')->with('success', 'JumboSlider anda berhasil diubah!');
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
        $jumboslider = JumboSlider::find($id);
        $jumboslider->delete();

        return redirect('admin/jumboslider')->with('error', 'Jumboslider anda telah berhasil dihapus!');
    }
}
