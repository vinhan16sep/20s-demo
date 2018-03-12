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
use Hash;
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

    public function showChangeForm()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }

}
