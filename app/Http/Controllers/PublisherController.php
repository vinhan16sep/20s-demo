<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PublisherController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web');
        echo Auth::user();
    }

    public function index()
    {
    	return view('publisher');
    }
}
