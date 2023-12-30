<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function userProfile(){
        return view('User.profile');
    }
}
