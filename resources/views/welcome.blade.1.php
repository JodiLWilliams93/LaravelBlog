@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Control Structures</h1>
        @if(false)
            <p>This only diplays if it is true</p>
        @else
            <p>This only diplays if it is false</p>
        @endif

        <hr>

        @for($i=0; $i < 5; $i++)
            @if($i == 0)
                <p>{{ $i + 1 }} Iteration</p>
            @else
                <p>{{ $i + 1 }} Iterations</p>
            @endif
        @endfor

        <hr>
        <h2>XSS</h2>
        {{ "<script>alert('Hello')</script>" }}
        {!! "<script>alert('Hello')</script>" !!}
            
    </div>
</div>
@endsection