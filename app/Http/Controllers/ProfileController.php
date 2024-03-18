<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string|min:5|max:50',
            'phone' => 'required|string|min:10|max:15|unique:users',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }
    public function userProfile(){
        if(Auth()->user()->role == "User"){
            return view('User.profile');
        }
        else{
            return view('Seller.profile');
        }
    }

    public function editUser()
    {
        $user = auth()->user();
        return view('editProfile', compact('user'));
    }

    public function updateUser( Request $request)
    {
        $userData = $request->all();
        $validator = $this->Validator($userData);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
        if (isset($userData['profile_image'])) {
            $image = $userData['profile_image'];
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('Images/Users/', $image_new_name);
            $imagePath = 'Images/Users/' . $image_new_name;
        } else {
            $imagePath = 'Images/Users/default.jpg';
        }
        $data['profile_image']= $imagePath;
        $user = User::where('id', $request->id)->first();
        return $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'profile_image' => $data['profile_image'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
}
