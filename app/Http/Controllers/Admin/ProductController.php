<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Alert;
use App\Models\Web;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
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
            $products = Product::where('nama_produk', 'LIKE', "%$keyword%")
            	->orWhere('manfaat', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        $web = Web::findOrFail(1);
        $myItem = DB::table('products')
                    ->join('users', 'products.penjual', '=', 'users.id')
                    ->select('products.*', 'users.name')
                    ->get();
        return view('admin.product.index', compact('products', 'myItem', 'web'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $web = Web::findOrFail(1);
        return view('admin.product.create', compact('web'));
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
                'nama_produk' => 'required',
                'gambar1' => 'image|nullable|max:1999',
                'deskripsi' => 'required',
                'komposisi' => 'required',
                'manfaat' => 'required',
                'isi' => 'required',
                'harga' => 'required'
        	]
        );

        //Handle File Upload Gambar
        if($request->hasFile('gambar1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar1')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            // Cara Upload ke google ke-1
            $path = $request->file('gambar1')->storeAs('public/img/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        //Handle File Upload Gambar
        if($request->hasFile('gambar2')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('gambar2')->getClientOriginalName();
            // Get just filename 
            $filename2 = pathInfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('gambar2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename2."_".time().'.'.$extension2;
            // Upload image
            // Cara Upload ke google ke-1
            $path2 = $request->file('gambar2')->storeAs('public/img/products', $fileNameToStore2);
        } else {
            $fileNameToStore2 = NULL;
        }

        //Handle File Upload Gambar
        if($request->hasFile('gambar3')){
            // Get filename with the extension
            $filenameWithExt3 = $request->file('gambar3')->getClientOriginalName();
            // Get just filename 
            $filename3 = pathInfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
            $extension3 = $request->file('gambar3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename3."_".time().'.'.$extension3;
            // Upload image
            // Cara Upload ke google ke-1
            $path3 = $request->file('gambar3')->storeAs('public/img/products', $fileNameToStore3);
        } else {
            $fileNameToStore3 = NULL;
        }

        // Create Products
        $products = new Product;
        $products->nama_produk = $request->input('nama_produk');
        $products->gambar1 = $fileNameToStore;
        $products->gambar2 = $fileNameToStore2;
        $products->gambar3 = $fileNameToStore3;
        $products->deskripsi = $request->input('deskripsi');
        $products->komposisi = $request->input('komposisi');
        $products->manfaat = $request->input('manfaat');
        $products->isi = $request->input('isi');
        $products->isi2 = $request->input('isi2');
        $products->isi3 = $request->input('isi3');
        $products->isi4 = $request->input('isi4');
        $products->harga = $request->input('harga');
        $products->harga2 = $request->input('harga2');
        $products->harga3 = $request->input('harga3');
        $products->harga4 = $request->input('harga4');
        $products->penjual = Auth::user()->id;
        $products->save();

        return redirect('admin/produk')->with('success', 'Produk telah berhasil dibuat!');
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
        $products = Product::findOrFail($id);
        return view('admin.product.show', compact('products', 'web'));
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
        $web = Web::findOrFail(1);
        $products = Product::findOrFail($id);
        return view('admin.product.edit', compact('web'))->with('products', $products);
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
                'nama_produk' => 'required',
                'gambar1' => 'image|nullable|max:1999',
                'deskripsi' => 'required',
                'komposisi' => 'required',
                'manfaat' => 'required',
                'isi' => 'required',
                'harga' => 'required'
            ]
        );

        //Handle File Upload Gambar
        if($request->hasFile('gambar1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar1')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            // Cara Upload ke google ke-1
            $path = $request->file('gambar1')->storeAs('public/img/products', $fileNameToStore);
        }

        //Handle File Upload Gambar
        if($request->hasFile('gambar2')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('gambar2')->getClientOriginalName();
            // Get just filename 
            $filename2 = pathInfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('gambar2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename2."_".time().'.'.$extension2;
            // Upload image
            // Cara Upload ke google ke-1
            $path2 = $request->file('gambar2')->storeAs('public/img/products', $fileNameToStore2);
        }

        //Handle File Upload Gambar
        if($request->hasFile('gambar3')){
            // Get filename with the extension
            $filenameWithExt3 = $request->file('gambar3')->getClientOriginalName();
            // Get just filename 
            $filename3 = pathInfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
            $extension3 = $request->file('gambar3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename3."_".time().'.'.$extension3;
            // Upload image
            // Cara Upload ke google ke-1
            $path3 = $request->file('gambar3')->storeAs('public/img/products', $fileNameToStore3);
        }

        // Update Database
        $products = Product::find($id);
        $products->nama_produk = $request->input('nama_produk');
        if($request->hasFile('gambar1')){
            $products->gambar1 = $fileNameToStore;
        }
        if($request->hasFile('gambar2')){
            $products->gambar2 = $fileNameToStore2;
        }
        if($request->hasFile('gambar3')){
            $products->gambar3 = $fileNameToStore3;
        }
        if($request->hasFile('gambar4')){
            $products->gambar4 = $fileNameToStore4;
        }
        $products->deskripsi = $request->input('deskripsi');
        $products->komposisi = $request->input('komposisi');
        $products->manfaat = $request->input('manfaat');
        $products->isi = $request->input('isi');
        $products->isi2 = $request->input('isi2');
        $products->isi3 = $request->input('isi3');
        $products->isi4 = $request->input('isi4');
        $products->harga = $request->input('harga');
        $products->harga2 = $request->input('harga2');
        $products->harga3 = $request->input('harga3');
        $products->harga4 = $request->input('harga4');
        $products->penjual = Auth::user()->id;
        $products->save();

        return redirect('admin/produk')->with('success', 'Produk berhasil dirubah!');
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
        $products = Product::find($id);
        $products->delete();

        return redirect('admin/produk')->with('error', 'Produk anda telah berhasil dihapus!');
    }
}