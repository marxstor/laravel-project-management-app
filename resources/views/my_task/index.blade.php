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
            <div class = "flex justify-between items-center mb-4">
                <h2 class = "font-bold text-slate-600" >My tasks</h2>

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
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($mytasks->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No tasks available.
                            </td>
                        </tr>
                        @endif

                        @php $counter = 1; @endphp

                        @foreach($mytasks as $mytask)
                            <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $counter++ }} <!-- Increment the counter -->
                            </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $mytask->projects->proj_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $mytask->task_name }}
                                    
                                </td>

                                @if($mytask->task_status == "PENDING")
                                    <td class="px-6 py-4 text-yellow-600">
                                        {{ $mytask->task_status }}
                                    </td>
                                @elseif($mytask->task_status == "IN PROGRESS")
                                    <td class="px-6 py-4 text-blue-600">
                                        {{ $mytask->task_status }}
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-green-600">
                                        {{ $mytask->task_status }}
                                    </td>
                                @endif

                                <td class="px-6 py-4 text-blue-600">
                                    <a href="{{route('my_task.edit', $mytask->task_id)}}" class = "hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
