@extends('layout')
@include('partials.header')
@include('partials.navbar')

@section('content')

    @if(session('success'))
        <script>alert("{{session('success')}}")</script>
    @endif
    {{-- <div class="page-title border-gray-200 bg-white mb-5">
        <div class="flex justify-between items-center mx-24">
            <p class = "title text-lg text-slate-900  p-4 font-bold">Project</p>
            @if(auth()->user()->user_type->user_type == "ADMIN")
                <a href="{{route('project.create')}}" class = "bg-green-600 rounded-lg text-white text-sm px-2 rounded-lg ">Add new project</a>
            @endif
        </div>
    </div> --}}

    <div class="max-w-full bg-white rounded-lg shadow mx-24 p-6">
        <div class="table-contents">
            <div class = "flex justify-between items-center mb-4">
                <h2 class="font-bold text-slate-800">List of Projects</h2>
                @if(auth()->user()->user_type->user_type == "ADMIN")
                    <a href="{{route('project.create')}}" class = "text-sm p-3 bg-blue-600 py-2 text-white rounded-lg ">Create new project</a>
                @endif
                {{-- <div class="search-bar">
                    <form action="#">
                        <input type="text" class = "text-sm w-96 p-3 text-gray-900 bg-gray-100 rounded-lg" placeholder = "Seach project...">
                        <button class = "bg-blue-600 text-sm p-3 rounded-lg text-white">Search</button>
                    </form>
                </div> --}}
            </div>
           
            

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b-2 border-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Project name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Project description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created By
                            </th>
                            @if(auth()->user()->user_type->user_type == "ADMIN")
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if($projects->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4  text-gray-500 text-center">
                                No projects available.
                            </td>
                        </tr>
                        @endif
                        @foreach($projects as $project)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <a href = "{{route('project.show', $project->id)}}" class = "hover:underline">{{$project->proj_name}}</a>
                            </th>
                            <td class="px-6 py-4">
                                {{$project->proj_desc}}
                            </td>
                            <td class="px-6 py-4">
                                @if($project->proj_status == "PENDING")
                                    <p class = "text-yellow-600 px-2 rounded-lg">{{$project->proj_status}}</p>
                                @elseif($project->proj_status == "IN PROGRESS")
                                    <p class = "text-blue-600 px-2 rounded-lg">{{$project->proj_status}}</p>
                                @else
                                    <p class = "text-green-600 px-2 rounded-lg">{{$project->proj_status}}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $project->creator->name}}
                            </td>

                            @if(auth()->user()->user_type->user_type == "ADMIN")
                                <td class="px-6 py-4">
                                    <div class="actions">
                                        <a href="{{route('project.edit', $project->id) }}" class = "text-blue-600 underline">Edit</a>
                                        <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 underline" onclick="return confirm('Are you sure you want to delete this project?');">Delete</button>
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