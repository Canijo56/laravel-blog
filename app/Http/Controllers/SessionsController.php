<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
		//only guest would be at sign/login page	
	}
    public function create()
    {
    	return view('sessions.create');

    }
    public function store()
    {
    	// Attemp to authenticate the user.
    	if (! auth()->attempt(request(['email', 'password']))){
    		return back()->withErrors([
    			'message' => 'Please check your credentials.'
    		]);
    	}
    	// If not, redirect back
    	// If so, sign them in
    	return redirect()->home();
    	// Redirect to the home page
    }
    public function destroy()
    {
    	auth()->logout();
    	return redirect()->home();
    }
}
