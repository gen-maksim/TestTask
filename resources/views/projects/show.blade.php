@extends('layouts.app')

@section('content')

    <h1 class="title">{{ $project->title }}</h1>


    <div class="content">Made by:{{ $project->user->name }}</div>

    <div class="content">{{ $project->description }}</div>

    <a href="{{ route('projects.edit', $project->id) }}">Edit</a>

@endsection