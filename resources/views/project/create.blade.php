@extends('layout')
@include('partials.header')

@section('content')
    <div class="page-title border-gray-200 bg-white mb-5 py-4 px-4">
        <div class="">
            <p class = "title text-sm text-slate-900 mx-24"><a href="{{route('project.index')}}" class = "hover:underline">Project</a> - <span class = "text-blue-600">Create new project</span></p>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6">
        
        <form class="max-w-full" action = "{{route('project.store')}}" method = "post">
            @csrf
            @method('POST')
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Project title</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder = "Write project title" name = "proj_name">
            </div>

            <div class="mb-5">
                
                <label for="message" class="block mb-2 text-base font-medium text-gray-900">Project description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write project description here..." name = "proj_desc"></textarea>

            </div>


            <div>
                <label for="small-input" class="block mb-2 text-base font-medium text-gray-900">Project deadline</label>
                <input type="date" id="small-input" class="block w-full text-base p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" name = "proj_deadline">
            </div>

            <div class="w-full flex justify-end items-center mt-5">
                <a href="{{route('project.index')}}" class = "mr-4 text-slate-600 hover:text-slate-900 hover:underline" >Cancel</a>
                <button type = "submit" class = "bg-green-600 py-2 px-4 rounded-lg text-white hover:bg-green-800">Create</button>
            </div>
            
        </form>

    </div>

@endsection