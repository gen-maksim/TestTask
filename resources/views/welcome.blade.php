@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100%">
    <p class="d-flex h1"> Hi, you need to <br>
        <a href="{{ route('login') }}"> login <br> </a>
        first</p>
</div>
@endsection