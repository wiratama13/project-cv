<?php

namespace App\Http\Controllers;

use App\Models\About;
use Exception;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $redirectTo = '/';

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', function ($attribute, $value, $fail) {
                if (!DB::table('users')->where('email', $value)->exists()) {
                    $fail('Email tidak ditemukan atau password salah');
                }
            }],
            'password'   => 'required',
        ]);


        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
        
    }

    public function register(Request $request)
    {

        $unvalidate = [
            'email.unique' => 'Email sudah terdaftar silahkan login'
        ];
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $unvalidate);
    
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $detail = UserDetail::create([
            'user_id'  => $user->id,
            'name'     => $request->name,
            'email'    => $request->email
        ]);

        About::create([
            'user_detail_id'  => $detail->id,
            'tentang'         => 'keterangan belum diisi',
        ]);

        return redirect()->route('login')->with('success','berhasil membuat pengguna baru, silahkan login');
    }

    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function error()
    {
        return view('403');
    }

    public function ubahPassword()
    {
        User::where('kode_mitra','240100001')->update([
            'password' => Hash::make('katasandi')
        ]);

        return 'ubah password berhasil';
    }
}
