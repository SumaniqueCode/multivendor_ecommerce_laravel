<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string|min:5|max:50',
            'phone' => ['required', 'string', 'min:10', 'max:15', 'unique:user'],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (isset($data['profile_image'])) {
            $image = $data['profile_image'];
            $image_new_name = time() . $image->getClientOriginalName();
            // $image_new_name = str_replace(" ", '', $request->name)."_profile_".time();
            $image->move('Images/Users/', $image_new_name);
            $imagePath = 'Images/Users/' . $image_new_name;
        } else {
            $imagePath = auth()->user()->profile_image;
        }
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=>$data['phone'],
            'gender'=>$data['gender'],
            'address'=>$data['address'],
            'profile_image'=>$imagePath,
            'date_of_birth'=>$data['date_of_birth'],
        ]);
    }
}
