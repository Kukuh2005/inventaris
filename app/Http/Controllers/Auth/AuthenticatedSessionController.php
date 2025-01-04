<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function postlogin(Request $request):RedirectResponse
    {
        $email = User::where('email', $request->email)->exists();

        if(!$email){
            return back()->with('gagal', 'Email ' . $request->email . ' belum terdaftar!');
        }else{
            if(Auth::attempt($request->only('email', 'password'))){
                $user = Auth::user();
    
                return redirect($user->role . '/dashboard')->with('sukses', 'Berhasil login sebagai ' . $user->role);
            }
            else {
                return back()->with('gagal', 'Email atau Password salah!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('sukses', 'Berhasil logout.');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
