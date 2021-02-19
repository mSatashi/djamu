<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Web;
use App\Models\User;
use App\Models\Product;
use App\Models\JumboSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
    	$users = User::where('id', 1)->get();
    	if(!$users->isEmpty()){
    		$checkWeb = Web::where('id', 1)->get();
    		if(!$checkWeb->isEmpty()) {
    			$web = Web::find(1);
                $checkJumboSlider = JumboSlider::latest()->take(3)->get();
                $checkProduct = Product::where('id', 1)->get();
	    		if(!$checkJumboSlider->isEmpty() && !$checkProduct->isEmpty()){
                    $jumboslider = JumboSlider::latest()->get();
                    $product = Product::latest()->take(4)->get();
	    			return view('welcome', compact('jumboslider', 'web', 'product'));
	    		} else {
	    			return Redirect::to('toko')->withErrors('message', 'Silahkan login lalu tambahkan Jumbo Slider terlebih dahulu');
	    		}
	    	} else {
	    		return Redirect::to('/installasi');
	    	}
    	} else {
    		return view('install/akun');
    	}
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
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'born_date' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'password' => 'required|min:8',
                'avatar' => 'image|nullable|max:1999'
        	]
        );

        //Handle File Upload Gambar
        if($request->hasFile('avatar')){
            // Get filename with the extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            // Cara Upload ke google ke-1
            $path = $request->file('avatar')->storeAs('public/img/users', $fileNameToStore);
        } else {
        	if($request->input('gender') == "male"){
        		$fileNameToStore = 'avatar.png';
        	} else {
        		$fileNameToStore = 'avatar2.png';
        	}
        }

        // Create Admin Account
        $arrName = array($request->input('first_name'), $request->input('last_name'));
        $users = new User;
        $users->name = join(" ", $arrName);
        $users->email = $request->input('email');
        $users->level = "Admin";
        $users->born_date = $request->input('born_date');
        $users->phone = $request->input('phone');
        $users->gender = $request->input('gender');
        $users->password = Hash::make($request->input('password'));
        $users->avatar = $fileNameToStore;
        $users->save();

        return redirect('installasi')->with('success', 'Akun Admin telah berhasil dibuat!');
    }
}
