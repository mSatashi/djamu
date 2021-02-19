<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Web;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class TokoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 12;

        if (!empty($keyword)) {
            $products = Product::where('nama_produk', 'LIKE', "%$keyword%")
                ->orWhere('manfaat', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        $web = Web::findOrFail(1);
        return view('toko.index', compact('products', 'web'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $myProduct
     *
     * @return void
     */
    public function show(Product $myProduct)
    {
        $web = Web::findOrFail(1);
        $products = Product::latest()->take(4)->get();
        return view('toko.show', compact('myProduct', 'web', 'products'));
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
                'jumlah' => 'required',
                'isi' => 'required'
            ]
        );

        $checkId = Product::findOrFail($request->input('id'));
        $checkOrderId = Order::where('status', 'keranjang')->get();

        if($request->input('isi') == $checkId->isi1) {
            $harga = $checkId->harga * $request->input('jumlah');
            $berat = $checkId->isi1 * $request->input('jumlah');
        } else if($request->input('isi') == $checkId->isi2) {
            $harga = $checkId->harga2 * $request->input('jumlah');
            $berat = $checkId->isi2 * $request->input('jumlah');
        } else if($request->input('isi') == $checkId->isi3) {
            $harga = $checkId->harga3 * $request->input('jumlah');
            $berat = $checkId->isi3 * $request->input('jumlah');
        } else {
            $harga = $checkId->harga4 * $request->input('jumlah');
            $berat = $checkId->isi4 * $request->input('jumlah');
        }

        if(!$checkOrderId->isEmpty()){
            //dd($checkOrderId);
            if($checkOrderId->user_id = Auth::user()->id) {
                // Create OrderDetail
                $orderdetail = new OrderDetail;
                $orderdetail->product_id = $request->input('id');
                $orderdetail->jumlah = $request->input('jumlah');
                $orderdetail->total_berat = $berat;
                $orderdetail->total_harga = $harga;
                $orderdetail->order_id = $checkOrderId->id;
                $orderdetail->user_id = Auth::user()->id;
                $orderdetail->save();
            }
        } else {
            $order = new Order;
            $order->berat = 0;
            $order->total_harga = 0;
            $order->status = "keranjang";
            $order->user_id = Auth::user()->id;
            $order->save();

            $latest->id = Order::latest()->where('user_id', Auth::user()->id)->get(1);
            $order = Order::findOrFail($latestId->id);
            $order->berat = 1;
            $order->save();
        }

        return redirect('toko/produk')->with('success', 'Produk berhasil dimasukkan!');
    }
}
