@extends('layouts.admin')

@section('content')
@include('partials.errors')
<div class="row">
    <div class="col-md-12">
        <h2 class='text-center'>New Tutorial</h2>
        <form action="{{ route('admin.tutorialCreate') }}" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <label for="">Related Tutorials</label>
            @foreach($relatedTutorials as $relatedTutorial)
            <div class="checkbox">
                <label for="">
                    <input type="checkbox" name="relatedTutorials[]" value="{{ $relatedTutorial->id }}"> {{ $relatedTutorial->title }}
                </label>
            </div>
            @endforeach
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection