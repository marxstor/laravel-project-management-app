@extends('layout')

@section('content')
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
    <div class="w-2/6 bg-white rounded-lg shadow">
        <div class="p-6 space-y-4">
            <h2 class = "font-bold text-xl text-center text-blue-600 mb-5 " style = "font-size: 1.675rem">TaskFlow</h2>

            <h1 class="text-xl font-bold text-gray-900 leading-tight tracking-tight">
                Create an account
            </h1>

            @error('email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <form action="{{ route('auth.signupUser') }}" method="post" class="space-y-4">
                @csrf
                @method('post')
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                    <input type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 w-full p-2 rounded-lg focus:ring-blue-600 focus:border-blue-600 focus:outline-none" placeholder="John Doe" name="name" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 w-full p-2 rounded-lg focus:ring-blue-600 focus:border-blue-600 focus:outline-none" placeholder="name@company.com" name="email" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 w-full p-2 rounded-lg focus:ring-blue-600 focus:border-blue-600 focus:outline-none" placeholder="********" name="password" required>
                </div>

                <button class="text-sm w-full bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-blue-300 font-medium" type="submit">Sign up</button>

                <p>
                    Already have an account? <a href="/" class="font-medium text-blue-600 hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
