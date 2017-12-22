<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    public function store(RegistrationForm $form)
    {
        $form->persist();
        session()->flash('message', 'thanks for signing up!'); // flash! exists for 1 request
        //Redirect to the home page
        return redirect()->home(); // or redirect('/');
    }
}
