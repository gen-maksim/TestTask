@extends('layouts.app')


@section('about', 'Projects')

@section('content')


                <div class="row">
                    <h2>Projects</h2>
                </div>

                <div class="row">
                <form class="justify-content-center" method="POST" action='{{ route('projects.update', $project->id) }}'>

                    {{ method_field('patch') }}

                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Your title" value="{{ $project->title }}">
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Your descr">{{ $project->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Save Project</button>
                    </div>

                </form>
            </div>

                <div class="row">
                <form method="POST" action='{{ route('projects.destroy', $project->id) }}'>

                    {{ method_field('delete') }}

                    {{ csrf_field() }}


                    <div>
                        <button class="btn btn-primary" type="submit">Delete</button>
                    </div>

                </form>
                </div>




@endsection