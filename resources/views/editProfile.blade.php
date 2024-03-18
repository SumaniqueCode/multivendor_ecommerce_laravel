@extends('User.Layout.layout')
@section('content')
    <div class="grid grid-cols-12 my-3">
        <div class="md:col-span-8 col-span-12 border border-green-600 rounded">
            <div class="grid grid-cols-12">
                <div class="bg-gray-300 py-2 px-3 col-span-12 border border-b-green-600">
                    <p class="">Edit User Data</p>
                </div>
                <form method="POST" action="/update-user" class="md:col-span-8 col-span-12 mx-auto">
                    <div class="grid grid-cols-12">
                        <div class="full_name col-span-12 my-1 flex">
                            <label for="name" class="full_name_label mx-2">Full Name</label>
                            <div>
                                <input type="text" id="name" name="name"
                                    class="name w-max border-blue-500 rounded py-1" value="{{ $user->name }}">
                                @error('name')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="email_address col-span-12 my-1 flex">
                            <label for="email" class="email_label mx-2">Email Address</label>
                            <div>
                                <input type="email" id="email" name="email"
                                    class="email border-blue-500 rounded py-1" value="{{ $user->email }}">
                                @error('email')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="phone_no col-span-12 my-1 flex">
                            <label for="phone" class="phone_label mx-2">Phone Number</label>
                            <div>
                                <input type="text" id="phone" name="phone"
                                    class="phone border-blue-500 rounded py-1" value="{{ $user->phone }}">
                                @error('phone')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="address_detail col-span-12 my-1 flex">
                            <label for="address" class="address_label mx-2">Address</label>
                            <div>
                                <input type="text" id="address" name="address"
                                    class="address border-blue-500 rounded py-1" value="{{ $user->address }}">
                                @error('address')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="gender_selection col-span-12 my-1 flex">
                            <label for="gender" class="gender_label mx-2">Gender</label>
                            <div>
                                <select id="gender" name="gender" class="gender border-blue-500 rounded py-1"
                                    value="{{ $user->name }}">
                                    <option selected disabled>Select Gender</option>
                                    <option name="" id="" value="Male">Male</option>
                                    <option name="" id="" value="Female">Female</option>
                                    <option name="" id="" value="Others">Others</option>
                                </select>
                                @error('gender')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="dob_box col-span-12 my-1 flex">
                            <label for="date_of_birth" class="date_of_birth_label mx-2">Date Of Birth</label>
                            <div>
                                <input type="date" id="date_of_birth" name="date_of_birth" class="date_of_birth"
                                    border-blue-500 rounded py-1 value="{{ $user->date_of_birth }}">
                                @error('date_of_birth')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="password_box col-span-12 my-1 flex">
                            <label for="password" class="password_label mx-2">Password</label>
                            <div>
                                <input type="password" id="password" name="password"
                                    class="password border-blue-500 rounded py-1" value="{{ $user->password }}">
                                @error('password')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="confirm_password_box col-span-12 my-1 flex">
                            <label for="confirm_password" class="confirm_password_label mx-2">Confirm Password</label>
                            <div>
                                <input type="confirm_password" id="confirm_password" name="confirm_password"
                                    class="confirm_password" value="">
                                @error('confirm_password')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="image_box col-span-12 my-1 flex">
                            <label for="profile_image" class="profile_image_label mx-2">Profile Image</label>
                            <div>
                                <input type="file" id="profile_image" name="profile_image"
                                    class="profile_image border-blue-500 rounded py-1" value="{{ $user->profile_image }}">
                                @error('profile_image')
                                    <p class="text-red-600 mx-2"></p>
                                @enderror
                            </div>
                        </div>
                        <div class="btn_box col-span-12 my-1 flex">
                            <button class="bg-blue-600 rounded text-white px-3 py-1 mx-auto">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
