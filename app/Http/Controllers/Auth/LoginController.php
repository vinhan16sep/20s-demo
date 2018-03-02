<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showBrandLoginForm(){
        return view('auth.brand-login');
    }

    public function brandLogin(Request $request){
        // Validate login data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if($this->guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 99], $request->remember)){
            // Redirect if user logged successful
            return redirect()->intended(route('brand.dashboard'));
        }

        // Throw them back to login form if un-successful
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}
