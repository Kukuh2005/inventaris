<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $cek_email = User::where('email', $request->email)->exists();
        
        if($cek_email){
            return back()->with('gagal', 'Email Sudah Terdaftar.');

        }
        
        if($request->password !== $request->password_confirm){
            return back()->with('gagal', 'Konfirmasi password tidak sesuai.');      
        }

        $role = $this->cekEmail($request->email);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $role;
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/login')->with('sukses', 'Register berhasil, Silahkan login.');
    }

    private function cekEmail($email)
    {
        if(strpos($email, '@admin.com') !== false)
        {
            return 'admin';
        }else{
            return 'staf';
        }
    }
}
