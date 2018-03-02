<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        // Validate login data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // Redirect if user logged successful
            return redirect()->intended(route('admin.dashboard'));
        }

        // Throw them back to login form if un-successful
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}
