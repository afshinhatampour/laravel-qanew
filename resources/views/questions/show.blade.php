@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="display-4">{{ $question->title }}</h1>
  <div class="col-md-12 row">
    <div class="col-md-4 bg-success text-white p-2">
      views {{ $question->views }}
    </div>
    <div class="col-md-4 bg-info text-white p-2">
      answers {{ $question->answers }}
    </div>
    <div class="col-md-4 bg-warning text-white p-2">
      votes {{ $question->votes }}
    </div>
  </div>
  <p class="text-muted bg-white p-2">
    {!! $question->body_html !!}
  </p>
</div>
@endsection