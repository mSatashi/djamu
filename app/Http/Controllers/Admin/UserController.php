<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use SweetAlert;
use App\Models\Web;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
            $users = User::where('nama_produk', 'LIKE', "%$keyword%")
            	->orWhere('manfaat', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::latest()->paginate($perPage);
        }

        $web = Web::findOrFail(1);
        return view('admin.users.index', compact('users', 'web'));
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
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('web'))->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return void
     */
    public function create(Request $request)
    {
        $this->validate(
            $request, 
            [
                'level' => 'require'
            ]
        );

        // Update Database
        $users = User::find($request->input('id'));
        $users->level = $request->input('level');
        $users->save();

        return redirect('admin/users')->with('success', 'Pengguna anda berhasil diubah!');
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
        $users = User::find($id);
        $users->delete();

        return redirect('admin/users')->with('error', 'Pengguna anda telah berhasil dihapus!');
    }
}
