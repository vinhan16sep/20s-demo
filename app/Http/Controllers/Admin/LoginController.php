<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
class LoginController extends Controller
{
    public function showLoginForm()
    {
    	return view('auth.login');
    }

    public function postLogin(Request $request)
    {
    	// Validate login data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
        	
        	return redirect('20s-admin');
        }else{
        	Session::flash('message', 'Email hoặc mật khẩu không đúng');
        	return redirect('20s-admin/login');
        }
    }
}
