<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use App\Admin;
use Validator;
class LoginController extends Controller
{
    public function showLoginForm()
    {
    	return view('auth.login');
    }
    public $successStatus = 200;

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

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        // Validate login data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        $checkEmail = DB::table('admins')->where('email', $request->input('email'))->first();
        if(!empty($checkEmail)){
            Session::flash('message', 'Email đã tồn tại');
            return redirect('20s-admin/register');
        }
        $admin = new Admin;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = 89;
        unset($input['password_confirmation']);
        $createAdmin = Admin::create($input);
        
        if($createAdmin == true){
            return redirect('20s-admin');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('20s-admin');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
