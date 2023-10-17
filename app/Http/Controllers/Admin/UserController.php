<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:users.index|users.create|users.edit|users.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->when(request()->q, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('users', 'public');
        }


        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'avatar'    => $avatar
        ]);

        $user->assignRole($request->input('role'));
        if ($user) {
            return redirect()->route('admin.user.index')->with(['toast_success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('admin.user.index')->with(['toast_fail' => 'Data Gagal Disimpan!']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($user->id);

        $data = [
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('users', 'public');
            $data['avatar'] = $avatar;
        }

        $user->update($data);

        // Sync roles
        $user->syncRoles($request->input('role'));

        if ($user) {
            return redirect()->route('admin.user.index')->with(['toast_success' => 'Data Berhasil Diubah']);
        } else {
            return redirect()->route('admin.user.index')->with(['toast_fail' => 'Data Gagal Diupdate!']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();

        return back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
