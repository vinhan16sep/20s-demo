<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PublisherController extends Controller
{
	public function __construct(){
        $this->middleware(function($request, $next){
            if ( Auth::guard('web')->check() && Auth::guard('web')->user()->getRole() == 89 ) {
                return $next($request);
            }else{
                Auth::logout();
                return redirect()->intended(route('homepage'));
            }
        });
    }

    public function index(){
    	return view('publisher');
    }
}
