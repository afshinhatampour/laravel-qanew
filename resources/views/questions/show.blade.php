@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="display-4">{{ $question->title }}</h1>
  <div class="col-md-12 row">
    <div class="col-md-4 bg-success text-white p-2">
      views {{ $question->views }}
    </div>
    <div class="col-md-4 bg-info text-white p-2">
      answers {{ $question->answers_count }}
    </div>
    <div class="col-md-4 bg-warning text-white p-2">
      votes {{ $question->votes }}
    </div>
  </div>
  <div class="text-muted bg-white p-2">
    {!! $question->body_html !!}
    <div style="font-size:12px" class="float-right text-muted">
      <span>{{ $question->CreatedDate }}</span>
      <a href="{{ $question->user->url }}" class="pr-2">
        <img src="{{ $question->user->avatar }}" alt="">
      </a>
      <div class="media-body">
        <a href="{{ $question->user->url }}">
          {{ $question->user->name }}
        </a>
      </div>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-md-12">
      <h2 class="bg-info text-white p-2">Answers {{ $question->answers_count }}</h2>
      @foreach ($question->answers as $answer)
      <div class="media bg-dark text-white p-2 mb-2">
        <div class="media-body">
          {!! $answer->body_html !!}
          <div style="font-size:12px" class="float-right text-muted">
            <span>{{ $answer->CreatedDate }}</span>
            <a href="{{ $answer->user->url }}" class="pr-2">
              <img src="{{ $answer->user->avatar }}" alt="">
            </a>
            <div class="media-body">
              <a href="{{ $answer->user->url }}">
                {{ $answer->user->name }}
              </a>
            </div>
          </div>
          <hr>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection