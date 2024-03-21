<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string|min:5|max:50',
            'phone' => ['required', 'string', 'min:10', 'max:15', Rule::unique('users')->ignore(auth()->user()->id)],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    public function userProfile()
    {
        return view('profile');
    }

    public function editUser()
    {
        $user = auth()->user();
        return view('editProfile', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $data = $request->all();
        $validator = $this->Validator($data);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        if (isset($data['profile_image'])) {
            $image = $data['profile_image'];
            $image_new_name = time() . $image->getClientOriginalName();
            // $image_new_name = str_replace(" ", '', $request->name)."_profile_".time();
            $image->move('Images/Users/', $image_new_name);
            $imagePath = 'Images/Users/' . $image_new_name;
        } else {
            $imagePath = auth()->user()->profile_image;
        }

        $data['profile_image'] = $imagePath;
        $user = User::where('id', auth()->user()->id)->first();
        if ($request->password != null) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'profile_image' => $imagePath,
        ]);
        return back()->with(['success' => "User Data Updated", 'user' => $user]);
    }
}
