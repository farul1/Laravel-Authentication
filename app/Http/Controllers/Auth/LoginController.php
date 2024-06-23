<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |Login Controller
    |--------------------------------------------------------------------------
    |
    |This controller handles authenticating users for theapplication and
    |redirecting them to your home screen. The controlleruses atrait
    |to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     *Where to redirect users after login.
     *
     *@var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     *Create a new controller instance.
     *
     *@return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
