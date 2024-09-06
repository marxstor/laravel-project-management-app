@extends('layout')
@include('partials.header')

@section('content')
    <div class="page-title border-gray-200 bg-white mb-5 py-4 px-4">
        <div class="">
            <p class = "title text-sm text-slate-900 mx-24"><a href="{{route('project.index')}}" class = "hover:underline">Project</a> - <span class = "text-blue-600">{{$project->proj_name}}</span></p>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6">
        <h2 class = "mb-4 font-bold text-lg">Edit Project</h2>
        
        <form class="max-w-full mx-auto" action = "{{route('project.update', $project->id)}}" method = "post">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Project title</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder = "Write project title" name = "proj_name" value = "{{$project->proj_name}}">
            </div>

            <div class="mb-5">
                
                <label for="message" class="block mb-2 text-base font-medium text-gray-900">Project description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write project description here..." name = "proj_desc">{{$project->proj_desc}}</textarea>

            </div>

            <div>
                <label for="small-input" class="block mb-2 text-base font-medium text-gray-900">Project deadline</label>
                <input type="date" id="small-input" class="block w-full text-base p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" name = "proj_deadline" value = "{{$project->proj_deadline}}">
            </div>
            
            <div class="max-w-full mt-2 mx-auto">
                <label for="status" class="block mb-2 text-base font-medium text-gray-900">Select an option</label>
                <select id="status" name = "proj_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="PENDING" {{$project->proj_status == "PENDING" ? 'selected' : ''}}>PENDING</option>
                    <option value="IN PROGRESS"  {{$project->proj_status == "IN PROGRESS" ? 'selected' : ''}}>IN PROGRESS</option>
                    <option value="DONE"  {{$project->proj_status == "DONE" ? 'selected' : ''}}>DONE</option>
                </select>

            </div>

            <div class="buttons flex items-center justify-end my-5">
                <a href="{{route('project.index')}}">Cancel</a>
                <button type = "submit" class = "bg-green-600 rounded-lg text-white ml-2 px-4 py-2">Update</button>
            </div>
        </form>

    </div>

@endsection