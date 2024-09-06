@extends('layout')
@include('partials.header')

@section('content')
    <div class="page-title border-gray-200 bg-white mb-5 py-4 px-4">
        <div class="">
            <p class = "title text-sm text-slate-900 mx-24"><a href="{{route('tasks.index')}}" class = "hover:underline">Task</a> - <span class = "text-blue-600">Create new task</span></p>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6">
        
        <form class="max-w-full mx-auto" action = "{{route('tasks.update', $task->task_id)}}" method = "post">
            @csrf
            @method('PUT')
            

            <div class="max-w-full mt-2 mb-5 mx-auto">
                <label for="status" class="block mb-2 text-base font-medium text-gray-900">Project name</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder = "Enter task name" value="{{$task->projects->proj_name}}" readonly>
            </div>

            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Task Name</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder = "Enter task name" name = "task_name" value = "{{$task->task_name}}">
            </div>


            <div>
                <label for="small-input" class="block mb-2 text-base font-medium text-gray-900">Task deadline</label>
                <input type="date" id="small-input" class="block w-full text-base p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" name = "task_due" value = "{{$task->task_due}}">
            </div>

            <div class="max-w-full mt-2 mb-5 mx-auto">
                <label for="status" class="block mb-2 text-base font-medium text-gray-900">Assigned user</label>
                <select id="status" name = "assigned_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($users as $user)
                        @if($user->user_type->user_type == "TEAM MEMBER")
                            <option value="{{ $user->id }}" {{ $task->assigned_user == $user->id ? 'selected': ''}}>{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="buttons flex items-center justify-end my-5">
                <a href="{{route('tasks.index')}}">Cancel</a>
                <button type = "submit" class = "bg-green-600 rounded-lg text-white ml-2 px-4 py-2">Update</button>
            </div>
        </form>

    </div>

@endsection