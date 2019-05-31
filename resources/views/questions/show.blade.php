@extends('layouts.app')

@section('content')
@if (session()->has('success'))
  <p class="alert alert-success">{{ session('success') }}</p>
@endif
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
    <div>
      <a href="#" class="vote-up" title="This question is usefull">
        <i class="fas fa-caret-up"></i>
      </a>
      <span>1230</span>
      <a href="#" class="vote-down" title="This question is not usefull">
        <i class="fas fa-caret-down"></i>
      </a><br>
      <a class="favorite" href="#" title="Click to mark as favorite question">
        <i class="fas fa-star"></i>
      </a>
      <span class="favorite-num">123</span>
    </div>
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
          <div>
            <a href="#" class="vote-up" title="This question is usefull">
              <i class="fas fa-caret-up"></i>
            </a>
            <span>1230</span>
            <a href="#" class="vote-down" title="This question is not usefull">
              <i class="fas fa-caret-down"></i>
            </a><br>
            <a class="favorite" href="#" title="Click to mark as favorite question">
              <i class="fas fa-check"></i>
            </a>
          </div>
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
      <h4>Your Answer : </h4>
      <form action="{{ route('questions.answers.store', $question->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
          @if ($errors->has('body'))
              <div class="invalid-feedback">
                <strong>{{ $errors->first('body') }}</strong>
              </div>
          @endif
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-outline-info">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection