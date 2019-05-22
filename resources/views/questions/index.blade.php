@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="display-4 q-list-title" style="display:inline">All Questions</p>
                    <a href="{{ route('questions.create') }}" class="btn btn-sm btn-primary float-right">Ask a
                        question</a>
                </div>
                <div class="card-body">
                    @foreach($questions as $question)
                    <div class="row col-md-12 question-container p-3 mb-3">
                        <div class="col-md-1 p-0">
                            <div class="vote p-1">
                                <strong>{{ $question->votes }}</strong><br>
                                {{ str_plural('vote',$question->votes) }}
                            </div>
                            <div class="status {{ $question->Status }} p-1">
                                <strong>{{ $question->answers }}</strong><br>
                                {{ str_plural('answer', $question->answers) }}
                            </div>
                            <div class="view p-1">
                                {{ $question->views }}
                                {{ str_plural('view', $question->views) }}
                            </div>
                        </div>
                        <div class="col-md-11 p-0">
                            <div class="card-header q-card-title">
                                <div class="row">
                                    <h3>
                                        <a href="{{ $question->url }}"> {{ $question->title  }} </a>
                                    </h3>
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                </div>
                                <p class="lead">Asked by :
                                    <a href="{{ $question->user->url }}">
                                        {{ $question->user->name }}
                                    </a>
                                    <small class="text-muted">
                                        {{ $question->created_date }}
                                    </small>
                                </p>
                            </div>
                            <div class="card-body q-card-body">
                                {{ str_limit($question->body, 250) }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="text-center">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection