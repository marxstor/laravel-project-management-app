@extends('layout')

@section('content')
    <div class="flex justify-center mt-5">
        <div class="relative flex bg-white w-2/6 shadow p-4">
            <button type = "button">Mark Reyes</button>
            <div class="absolute w-48 right-10 rounded-md bg-white py-1 shadow-lg">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
        </div>
        
    </div>

    
    
@endsection