@extends('layouts.app')


@section('about', 'Projects')

@section('content')

    <div class="card-header">
        Projects
    </div>
    <div class="card-body">
        <ul >
            @foreach($projects as $project)

                <a href='{{ route('projects.show', $project->id) }}'>
                    <li >{{ $project->title }}</li>
                </a>

            @endforeach
        </ul>
        <form action="{{ route('projects.create') }}">
            <input class="btn btn-primary" type="submit" value="New Project" />
        </form>
    </div>
@endsection