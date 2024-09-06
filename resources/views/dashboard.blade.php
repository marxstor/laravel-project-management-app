@extends('layout')
@include('partials.header')
@include('partials.navbar')

@section('content')

    <div class="grid xl:grid-cols-3 gap-2 lg:mx-24 md:grid-cols-2 sm:grid-cols-1 mb-5 lg:mx-24 xl:mx-24 xs:mx-2 sm:mx-10 xxs:mx-2">
        <div class="card">
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-yellow-400">Pending Tasks</h5>
                </a>
                <p class="my-3 text-lg font-normal text-gray-900">{{$pending_projects}} / {{$total_projects}}</p>
            </div>
        </div>
        <div class="card">
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-400">In-progress Tasks</h5>
                </a>
                <p class="my-3 text-lg font-normal text-gray-900">{{$task_in_progress}} / {{$total_tasks}}</p>
            </div>
        </div>
        <div class="card">
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-green-400">Completed Tasks</h5>
                </a>
                <p class="my-3 text-lg font-normal text-gray-900">{{$task_completed}} / {{$total_tasks}}</p>
            </div>
        </div>
    </div>

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6 lg:mx-24 xl:mx-24 xs:mx-2 sm:mx-10  xxs:mx-2">
        <div class="table-contents">
            @if(!auth()->user()->user_type->user_type == "ADMIN")
                <h2 class = "font-bold text-slate-800 mb-4">My active tasks</h2>
            @else
                <h2 class = "font-bold text-slate-800 mb-4">Task List</h2>
            @endif
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b-2 border-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Project name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Task name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Assigned User
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            @foreach($project->tasks as $task)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <a href="{{route('project.show', $project->id)}}" class = "hover:underline">{{$project->proj_name}}</a>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$task->task_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$task->task_status}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$task->assignedUser->name}}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        

                    </tbody>
                </table>
            </div>


        </div>
    </div>

    


@endsection