<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        session()->put('previousUrl', url()->previous());
        
        return view('auth.login');
    }

    public function redirecTo(Request $request, $user){
       
        $role = $user->role_id;
        if($role == 1 || $role == 2){
            return redirect()->route('admin.index');
        } else {
           return str_replace(url('/'), '', session()->get('previousUrl', '/'));
        }
    }

    protected function authenticated(Request $request, $user)
    {
          $role = $user->role_id;
        if($role == 1 || $role == 2){
            return redirect()->route('admin.index');
        }
        
    }
}
