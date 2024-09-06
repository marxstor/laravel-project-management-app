@extends('layout')
@include('partials.header')

@section('content')
    <div class="page-title border-gray-200 bg-white mb-5 py-4 px-4">
        <div class="">
            <p class = "title text-sm text-slate-900 mx-24"><a href="{{route('users.index')}}" class = "hover:underline">Users</a> - <span class = "text-blue-600">User information</span></p>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6 mb-5">
        
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Name</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "Enter your firstname" name = "name" id = "fname" value = "{{$user->name}}" readonly>
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Email</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "john@example.com" name = "email" id = "email" value = "{{$user->email}}" readonly>
            </div>

            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Password</label>
                <input type="password" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "********" name = "password" id = "password" value = "{{$user->password}}" readonly>
            </div>
            
            <!-- <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Confirm Password</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "********" id = "confirm_password">
            </div> -->

            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">User Type</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder = "john@example.com" name = "user_type" id = "email" value = "{{$user->user_type->user_type}}" readonly>
            </div>

    </div>

@endsection