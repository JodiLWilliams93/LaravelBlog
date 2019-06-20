@extends ('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">Laravel Tutorials</p>
        </div><!-- end .col-md-12 -->
    </div><!-- end .row -->
    <div class="row">
        <div class="col-md-12">
            <ul>
            @foreach ($tutorials as $tutorial)
                <li><a href="{{ route('tutorial.guide', ['id' => $tutorial->id]) }}">{{ $tutorial->title }}</a></li>
            @endforeach   
            </ul>
        </div>
    </div>
@endsection