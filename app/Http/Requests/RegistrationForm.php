<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Validate the form
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed' // understands class="password_confirmation"
        ];
    }

    public function persist()
    {
        // Create and save the user
        //$user = User::create(request(['name', 'email', 'password']));
        $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
        ]);
        // $user = User::create(
        //     $this->only(['name', 'email', 'password'])
        // );
        // Sign them in
        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));
        
    }
}
