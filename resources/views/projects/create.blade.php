@extends('layouts.app')


@section('about', 'Projects')

@section('content')


    <div class="row">
        <h2>Projects</h2>
    </div>

    <div class="row">
        <form class="justify-content-center" method="POST" action='{{ route('projects.store') }}'>

            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Your title" value="">
            </div>

            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Your descr"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Save Project</button>
            </div>

        </form>
    </div>



@endsection