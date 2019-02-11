@extends('layouts.app')


@section('about', 'Projects')

@section('content')

    <div class="title m-b-md">
        Projects
    </div>
    <form method="post" action="{{ route('projects.store') }}">

        {{ csrf_field() }}

        <div>
            <input type="text" name="title" required placeholder="Your title" value="{{ old('title') }}">
        </div>

        <div>
            <textarea name="description"  placeholder="Your descr">{{ old('decryption') }}</textarea>
        </div>

        <div>
            <button type="submit">Create Proj</button>
        </div>

        @if($errors->any())
            <div >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>

@endsection