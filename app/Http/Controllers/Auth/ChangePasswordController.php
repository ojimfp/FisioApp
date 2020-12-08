<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\User;

class ChangePasswordController extends Controller
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

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
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Ganti Password',
                'side_active'   => ''
            ],
        ];

        return view('auth.passwords.change', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'password_lama' => ['required', new MatchOldPassword],
            'password_baru' => ['required'],
            'konfirm_password' => ['same:password_baru']
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password_baru)]);

        $this->performLogout($request);
        return redirect()->route('login')
            ->with('msg', 'Password berhasil diganti. Silahkan login kembali dengan password baru.');
    }
}
