<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function authenticate(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended(route('habits.index'));
        }
        
        return back()->withErrors([
            'email' => 'Credenciais invalidas'
        ]);
        
    }
    public function logout(Request $request):RedirectResponse{
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
 
        return redirect(route('habits.index'));
    }
}
