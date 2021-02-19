<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Web;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $web = Web::findOrFail(1);
        $user = DB::table('users')->count();
        $order = DB::table('orders')->count();
        $product = DB::table('products')->count();
        return view('home', compact('web', 'user', 'order', 'product'));
    }
}
