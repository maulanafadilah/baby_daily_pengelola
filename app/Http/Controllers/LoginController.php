<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'nomor_telepon' => 'required',
            'password' => 'required',
            // 'role' => 'required'
            // 'role' => 'required|in:Kader, Admin'
        ]);

        // $role = User::find($request->nomor_telepon);

        $role = User::where('nomor_telepon', $request->nomor_telepon)->get('id_peranan')[0];

        // return $role;

        

        if(Auth::attempt($credentials)){

            if($role->id_peranan !== 1){
                return view('login.error');
            } else{
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

        }

        return back()->with('loginError', 'Login Gagal, Nomor Telepon atau Kata Sandi Salah!');
    }

    public function logout(){
        
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
