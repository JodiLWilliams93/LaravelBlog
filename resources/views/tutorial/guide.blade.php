@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
        <p class="quote">
            {{ $tutorial->title }}
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>
            {{ $tutorial->content }}
        </p>

        <p>
            Related Tutorials
            <ul>
                @foreach($relatedTutorials as $relatedTutorial)
                    
                    <li>
                        <a href="{{ route('tutorial.guide', [ 'id' => $relatedTutorial->id ]) }}">
                            {{ $relatedTutorial->title }}
                        </a>
                    </li>

                @endforeach
               
            </ul>
        </p>
        <p>
            Was this Tutorial Helpful?
            <a href="{{ route('tutorial.guide.thumbsup',  [ 'id' => $tutorial->id]) }}">&#128077; </a> {{ count($tutorial->thumbsUps) }}
            <a href="{{ route('tutorial.guide.thumbsdown',  [ 'id' => $tutorial->id]) }}"> &#128078; </a> {{ count($tutorial->thumbsDowns) }}
        </p>
    </div>
</div>
@endsection