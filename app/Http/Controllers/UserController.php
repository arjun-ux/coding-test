<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{


    public function index()
    {
        $this->authorize('isAdmin');

            $users = User::all()->sortDesc();
            // dd($users);
            return view('user.index', compact('users'));


    }

    public function create()
    {
        $this->authorize('isAdmin');

        return view('user.add');
    }

    public function store(Request $request)
    {
        $this->authorize('isAdmin');

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_name' => 'required',
        ]);
        // dd($request);
        // $roles = Role::pluck('role_name','id');
        // User::create($request->all());
        $datas = User::create([
            'name' => $request->name,
            'email' => $request ->email,
            'password' => $request->password,
            'role_name' => $request->role_name,
        ]);
        // dd($datas);
        return redirect()->route('user.index')
        ->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit($id)
    {
        $this->authorize('isAdmin');
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('isAdmin');


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => '',
            'role_name' => ''
        ]);

        $user = User::findOrFail($id);

        $user->update([
        'name' => $request->name,
        'email' => $request ->email,
        'password' => $request->password,
        'role_name' => $request->role_name,
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil Di ubah');
    }

    public function destroy($id)
    {
        // ambil data user
        $user = User::find($id);

        // delete user
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }


}
