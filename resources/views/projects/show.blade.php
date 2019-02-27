@extends('layouts.app')

@section('content')

    <div class="h1 text-center  ">Project: {{ $project->title }}
        <small class="text-muted">made by {{ $project->user->name }}</small>
    </div>

    <p class="lead">{{ $project->description }}</p>

    @can('view', $project)
        <form class="d-flex" action="{{ route('projects.edit', $project->id) }}">
            <input class="btn btn-primary" type="submit" value="Edit" />
        </form>
    @endcan
@endsection