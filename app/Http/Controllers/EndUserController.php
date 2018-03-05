<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndUserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware(function($request, $next){
            if ( Auth::guard('web')->check() && Auth::guard('web')->user()->getRole() == 79 ) {
                return $next($request);
            }else{
                Auth::logout();
                return redirect()->intended(route('homepage'));
            }
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('end-user');
    }
}
