@extends('layouts.master')

@section('content')
@if(Session::has('info'))
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-info">{{ Session::get('info')}}</p>
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('admin.tutorialCreate') }}" class="btn btn-success">New Tutorial</a>
    </div>
</div>
<hr>
@foreach ($tutorials as $tutorial)
<div class="row">
    <div class="col-md-12">
        <p>
            <strong>{{ $tutorial->title }}</strong>
            <a href="{{ route('admin.tutorialEdit', ['id' => $tutorial->id]) }}">Edit</a>
            <a href="{{ route('admin.tutorialDelete', ['id' => $tutorial->id]) }}">Delete</a>
        </p>
    </div>
</div>
@endforeach
@endsection