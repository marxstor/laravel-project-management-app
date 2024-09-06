@extends('layout')
@include('partials.header')

@section('content')
    <div class="page-title border-gray-200 bg-white mb-5 py-4 px-4">
        <div class="">
            <p class = "title text-sm text-slate-900 mx-24"><a href="{{route('users.index')}}" class = "hover:underline">Users</a> - <span class = "text-blue-600">Create new user</span></p>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6 mb-5">
        
        <form class="max-w-full mx-auto" action = "{{route('users.store')}}" method = "post" onsubmit = "return validateForm()">
            @csrf
            @method('POST')
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Firstname</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "Enter your firstname" name = "fname" id = "fname">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Middlename</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "Enter your middlename" name = "mname">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Lastname</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "Enter your lastname" name = "lname" id = "lname">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Email</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "john@example.com" name = "email" id = "email">
            </div>

            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Password</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "********" name = "password" id = "password">
            </div>
            
            <!-- <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Confirm Password</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "********" id = "confirm_password">
            </div> -->

            <div class="max-w-full mt-2 mx-auto">
                <label for="status" class="block mb-2 text-base font-medium text-gray-900">Select user type</label>
                <select id="user_type" name = "user_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="TEAM LEADER">TEAM LEADER</option>
                    <option value="MEMBER">MEMBER</option>
                </select>

            </div>
            

            <div class="w-full flex justify-end items-center mt-5">
                <a href="{{route('users.index')}}" class = "mr-4 text-slate-600 hover:text-slate-900 hover:underline" >Cancel</a>
                <button type = "submit" class = "bg-green-600 py-2 px-4 rounded-lg text-white hover:bg-green-800">Create</button>
            </div>
        </form>

    </div>

@endsection