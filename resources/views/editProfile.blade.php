@extends('layouts.layout')
@section('content')
    <script>
        $(document).ready(function() {
            $('#show_password').on('click', function() {
                if ($('#password').attr('type') == 'password') {
                    $('#password').attr('type', 'text');
                }
                else{
                    $('#password').attr('type', 'password');
                }
            });
            $('#show_password_confirmation').on('click', function() {
                if ($('#password_confirmation').attr('type') == 'password') {
                    $('#password_confirmation').attr('type', 'text');
                }
                else{
                    $('#password_confirmation').attr('type', 'password');
                }
            });
            $('#change_profile').on('click',function(){
                $('#profile_image').trigger('click');
            });
        });
    </script>
    <div class="grid grid-cols-12 my-3 place-items-center">
        <div class="md:col-span-8 md:col-start-3 col-span-12 border border-green-600 rounded w-full">
            <div class="grid grid-cols-12 w-full">
                <div class="bg-gray-300 py-2 px-3 col-span-12 border border-b-green-600">
                    <p class="">Edit User Data</p>
                </div>
                <form method="post" action="/update-user" enctype="multipart/form-data" class="md:col-span-8 md:col-start-3 col-span-12 w-full">
                    @csrf
                    <div class="grid grid-cols-12 w-full">
                        <div class="image_box col-span-12 my-1 w-full relative">
                                <img id="change_profile" src="{{ asset("/Images/Users/Camera_Icon.png") }}" class="change_profile absolute left-72 transition ease-in-out duration-300  opacity-0 hover:opacity-70 font-semibold bg-gray-200 h-full mx-auto rounded-full"/>
                                <img id="user_profile_image" src="{{ $user->profile_image }}" class="user_profile_image h-24 w-24 rounded-full mx-auto" alt="{{ $user->name }}">
                                <input type="file" id="profile_image" name="profile_image"
                                    class="hidden profile_image border-blue-500 rounded py-1 w-full" value="">
                                @error('profile_image')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="full_name col-span-12 my-1 flex w-full">
                            <label for="name" class="full_name_label w-1/3 mx-2">Full Name</label>
                            <div class="w-full">
                                <input type="text" id="name" name="name"
                                    class="name w-full border-blue-500 rounded py-1 w-full" value="{{ $user->name }}">
                                @error('name')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="email_address col-span-12 my-1 flex  w-full">
                            <label for="email" class="email_label w-1/3 mx-2">Email Address</label>
                            <div class="w-full">
                                <input type="email" id="email" name="email"
                                    class="email border-blue-500 rounded py-1  w-full" value="{{ $user->email }}">
                                @error('email')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="phone_no col-span-12 my-1 flex w-full">
                            <label for="phone" class="phone_label w-1/3 mx-2">Phone Number</label>
                            <div class="w-full">
                                <input type="text" id="phone" name="phone"
                                    class="phone border-blue-500 rounded py-1 w-full" value="{{ $user->phone }}">
                                @error('phone')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="address_detail col-span-12 my-1 flex w-full">
                            <label for="address" class="address_label w-1/3 mx-2">Address</label>
                            <div class="w-full">
                                <input type="text" id="address" name="address"
                                    class="address border-blue-500 rounded py-1 w-full" value="{{ $user->address }}">
                                @error('address')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="gender_selection col-span-12 my-1 flex w-full">
                            <label for="gender" class="gender_label w-1/3 mx-2">Gender</label>
                            <div class="w-full">
                                <select id="gender" name="gender" class="gender border-blue-500 rounded py-1 w-full">
                                    <option selected value="{{ $user->gender }}">Select Gender</option>
                                    <option name="" id="" value="Male">Male</option>
                                    <option name="" id="" value="Female">Female</option>
                                    <option name="" id="" value="Others">Others</option>
                                </select>
                                @error('gender')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="dob_box col-span-12 my-1 flex w-full">
                            <label for="date_of_birth" class="date_of_birth_label w-1/3 mx-2">Date Of Birth</label>
                            <div class="w-full">
                                <input type="date" id="date_of_birth" name="date_of_birth" class="date_of_birth
                                    border-blue-500 rounded py-1 w-full" value="{{ $user->date_of_birth }}">
                                @error('date_of_birth')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="password_box col-span-12 my-1 flex w-full">
                            <label for="password" class="password_label w-1/3 mx-2">Password</label>
                            <div class="w-full">
                                <input type="password" id="password" name="password"
                                    class="password border-blue-500 rounded py-1 w-2/3" value="">
                                <label id="show_password"
                                    class="bg-white-600 px-2 py-1 rounded text-blue-600 font-semibold text-sm hover:cursor-pointer">Show
                                    Password</label>
                                @error('password')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="password_confirmation_box col-span-12 my-1 flex w-full">
                            <label for="password_confirmation" class="password_confirmation_label w-1/3 mx-2">Confirm Password</label>
                            <div class="w-full">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="password_confirmation border-blue-500 rounded py-1 w-2/3" value="">
                                <label id="show_password_confirmation"
                                    class="bg-white-600 px-2 py-1 rounded text-blue-600 font-semibold text-sm hover:cursor-pointer">Show
                                    Password</label>
                                @error('password')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="profile_image_box col-span-12 my-1 flex w-full">
                            <label for="profile_image" class="profile_image_label w-1/3 mx-2">Profile Picture</label>
                            <div class="w-full">
                                <input type="file" id="profile_image" name="profile_image" required value=""
                                    class="profile_image border-blue-500 rounded py-1 w-full">
                                @error('profile_image')
                                    <p class="text-red-600 w-max mx-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="btn_box col-span-12 my-5 flex w-full">
                            <button type="submit"
                                class="bg-blue-600 rounded text-white px-3 py-1 mx-auto">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
