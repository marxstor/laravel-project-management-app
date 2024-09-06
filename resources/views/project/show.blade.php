@extends('layout')
@include('partials.header')

@section('content')
    <div class="page-title border-gray-200 bg-white mb-5 py-4 px-4">
        <div class="">
            <p class = "title text-sm text-slate-900 mx-24"><a href="{{route('project.index')}}" class = "hover:underline">Project</a> - <span class = "text-blue-600">{{$project->proj_name}}</span></p>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6">
        <h2 class = "mb-4 font-bold text-lg">Project information</h2>
        
        <form class="max-w-full mx-auto" action = "#" method = "post">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-base font-medium text-gray-900">Project title</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder = "Write project title" name = "proj_name" value = "{{$project->proj_name}}" readonly>
            </div>

            <div class="mb-5">
                
                <label for="message" class="block mb-2 text-base font-medium text-gray-900">Project description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write project description here..." name = "proj_desc" readonly>{{$project->proj_desc}}</textarea>

            </div>

            <div>
                <label for="small-input" class="block mb-2 text-base font-medium text-gray-900">Project deadline</label>
                <input type="date" id="small-input" class="block w-full text-base p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" name = "proj_deadline" value = "{{$project->proj_deadline}}" readonly>
            </div>
            
            <div class="max-w-full mt-2 mx-auto">
                <label for="status" class="block mb-2 text-base font-medium text-gray-900">Select an option</label>
                <input type="text" id="small-input" class="block w-full text-base p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" name = "proj_status" value = "{{$project->proj_status}}" readonly>
            </div>
        </form>

    </div>


    <div class="max-w-full bg-white rounded-lg shadow mx-24 my-5 p-6">
        <div class="table-contents">
            
            <div>
                <h2 class = "text-lg font-bold mb-2">Project tasks</h2>
            </div>
            

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b-2 border-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Task name
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created By
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Assigned to
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Due date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($project->tasks->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-4  text-gray-500">
                                No task available.
                            </td>
                        </tr>
                        @endif
                        @foreach($project->tasks as $task)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>

                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <a href = "{{route('project.show', $project->id)}}" class = "hover:underline">{{$task->task_name}}</a>
                            </th>
                            
                            <td class="px-6 py-4">
                                @if($task->proj_status == "PENDING")
                                    <p class = "text-yellow-600 px-2 rounded-lg">{{$task->task_status}}</p>
                                @elseif($task->task_status == "IN PROGRESS")
                                    <p class = "text-blue-600 px-2 rounded-lg">{{$task->task_status}}</p>
                                @else
                                    <p class = "text-green-600 px-2 rounded-lg">{{$task->task_status}}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{$task->created_by}}
                            </td>
                            <td class="px-6 py-4">
                                {{$task->assigned_user}}
                            </td>
                            <td class="px-6 py-4">
                                {{$task->task_due}}
                            </td>

                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>


        </div>
    </div>

@endsection