@extends('layout')
@include('partials.header')

@section('content')
    <div class="page-title border-gray-200 bg-white mb-5">
        <div class="">
            <p class = "title text-lg text-slate-900 mx-24 p-4 font-bold">Create new project</p>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6">
        
        <form class="max-w-full mx-auto" action = "{{route('my_task.update', $my_task->task_id)}}" method = "post">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Task name</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder = "Write project title" name = "task_name" value = "{{$my_task->task_name}}" readonly>
            </div>

            <div>
                <label for="small-input" class="block mb-2 text-base font-medium text-gray-900">Task deadline</label>
                <input type="date" id="small-input" class="block w-full text-base p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" name = "task_due" value = "{{$my_task->task_due}}" readonly>
            </div>
            
            <div class="max-w-full mt-2 mx-auto">
                <label for="status" class="block mb-2 text-base font-medium text-gray-900">Task status</label>
                <select id="status" name = "task_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="PENDING" {{$my_task->task_status == "PENDING" ? 'selected' : ''}}>PENDING</option>
                    <option value="IN PROGRESS"  {{$my_task->task_status == "IN PROGRESS" ? 'selected' : ''}}>IN PROGRESS</option>
                    <option value="DONE"  {{$my_task->task_status == "DONE" ? 'selected' : ''}}>DONE</option>
                </select>

            </div>

            <div class="buttons flex items-center justify-end my-5">
                <a href="{{route('my_task.index')}}">Cancel</a>
                <button type = "submit" class = "bg-green-600 rounded-lg text-white ml-2 px-4 py-2">Update</button>
            </div>
        </form>

    </div>

@endsection