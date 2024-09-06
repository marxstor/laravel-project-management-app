@extends('layout')

@section('content')
<div class="flex flex-col items-center justify-center px-6 py-8  mt-6">

    <div class = "lg:w-2/6 md:w-full sm:w-full xs:w-full bg-white rounded-lg shadow">
        <div class="p-6 space-y-4">
            <h2 class = "font-bold text-xl text-center text-blue-600 mb-5 " style = "font-size: 1.675rem">TaskFlow</h2>

            <h1 class = "text-xl font-bold text-gray-900 leading-tight tracking-tight">
                Sign in your account
            </h1>

            @if(session('success'))
                <div class = "text-green-600">
                    {{session('success')}}
                </div>
            @endif
            
            <form action="{{route('auth.loginUser')}}" method="post" class = "space-y-4">
                @csrf
                @method('post')
                <div>
                    <label for="email" class = "block mb-2 text-sm font-medium text-gray-900">Your email</label>
                    <input type="email" class = "bg-gray-50 border border-gray-300 text-gray-900 w-full p-2 rounded-lg focus:ring-blue-600 focus:border-blue-600 focus:outline-none" placeholder ="name@company.com" required = "" name = "email">
                </div>
                <div>
                    <label for="email" class = "block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" class = "bg-gray-50 border border-gray-300 text-gray-900 w-full p-2 rounded-lg focus:ring-blue-600 focus:border-blue-600 focus:outline-none" placeholder ="********" required = "" name = "password">
                </div>

                @if(session('error'))
                    <div class = "text-red-600">
                        {{session('error')}}
                    </div>
                @endif

                <div class = "my-2">
                    <a href = "#" class = "text-sm font-medium text-blue-600 hover:underline">Forgot password?</a> 
                </div>

                <button type = "submit" class = "text-sm w-full bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-blue-300 font-medium">Sign in</button>
                <p class = "xl:text-m sm:text-sm">
                    Don't have an account yet? <a href = "/signup" class = "font-medium text-blue-600 hover:underline">Sign-up</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection 