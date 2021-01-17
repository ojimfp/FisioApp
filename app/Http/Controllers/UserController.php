<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'User Management',
                'side_active'   => ''
            ],
            'users' => $users
        ];

        return view('user', $result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexKaryawan()
    {
        $users = User::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'List Karyawan',
                'side_active'   => 'karyawan'
            ],
            'users' => $users
        ];

        return view('karyawan', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'User Management',
                'side_active'   => ''
            ],
            'user' => $user,
            'roles' => $roles
        ];

        return view('edit_user', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->pekerjaan = $request->pekerjaan;
        $user->gaji_pokok = $request->gaji_pokok;
        $user->update();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('user');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($request->has('keyword')) {
            $users = User::where('name', 'LIKE', "%" . $keyword . "%")
                ->orWhere('email', 'LIKE', "%" . $keyword . "%")
                ->get();
        } else {
            $users = User::all();
        }

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'User Management',
                'side_active'   => ''
            ],
            'users' => $users
        ];

        return view('user', $result);
    }

    public function searchKaryawan(Request $request)
    {
        $keyword = $request->keyword;

        if ($request->has('keyword')) {
            $users = User::where('name', 'LIKE', "%" . $keyword . "%")
                ->orWhere('id', 'LIKE', "%" . $keyword . "%")
                ->get();
        } else {
            $users = User::all();
        }

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'User Management',
                'side_active'   => ''
            ],
            'users' => $users
        ];

        return view('karyawan', $result);
    }
}
