@extends('layout')
@include('partials.header')
@include('partials.navbar')

@section('content')

    @if(session('success'))
        <script>alert("{{session('success')}}")</script>
    @endif

    {{-- <div class="page-title border-gray-200 bg-white mb-5">
        <div class="flex justify-between items-center mx-24">
            <p class="title text-lg text-slate-900 p-4 font-bold">All Tasks</p>
            <a href="{{route('tasks.create')}}" class = "bg-green-600 rounded-lg text-white text-sm px-2 rounded-lg ">Add new task</a>
        </div>
    </div> --}}

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6">
        <div class="table-contents">
            <div class = "flex justify-between items-center mb-2">
                <h2 class = "font-bold text-slate-600" >List of tasks</h2>
                @if(auth()->user()->user_type->user_type != "MEMBER")
                    <a href="{{route('tasks.create')}}" class = "text-sm p-3 bg-blue-600 py-2 text-white rounded-lg ">Create new task</a>
                @endif
                {{-- <div class="search-bar">
                    <form action="#">
                        <input type="text" class = "text-sm w-96 p-3 text-gray-900 bg-gray-100 rounded-lg" placeholder = "Seach tasks...">
                        <button class = "bg-blue-600 text-sm p-3 rounded-lg text-white">Search</button>
                    </form>
                </div> --}}
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b-2 border-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Project name</th>
                            <th scope="col" class="px-6 py-3">Task name</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Created By</th>
                            <th scope="col" class="px-6 py-3">Assigned to</th>
                            @if(auth()->user()->user_type->user_type == "ADMIN")
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if($tasks->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No tasks available.
                            </td>
                        </tr>
                        @endif

                        @php $counter = 1; @endphp

                        @foreach($tasks as $task)
                            <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $counter++ }} <!-- Increment the counter -->
                            </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $task->projects->proj_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $task->task_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $task->task_status }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $task->taskCreator->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $task->assignedUser->name }}
                                </td>

                                @if(auth()->user()->user_type->user_type == "ADMIN")
                                <td class="px-6 py-4">
                                    <div class="actions">
                                        <a href="{{ route('tasks.edit', $task->task_id) }}" class="text-blue-600 underline">Edit</a>
                                
                                        <form action="{{ route('tasks.destroy', $task->task_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 underline" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                
                            @endif
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
