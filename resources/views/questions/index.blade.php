@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="display-4 q-list-title">All Questions</p>
                    </div>
                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="card mb-3 q-card">
                                <div class="card-header q-card-title">
                                    {{ $question->title  }}
                                </div>
                                <div class="card-body q-card-body">
                                    {{ str_limit($question->body, 250) }}
                                </div>
                            </div>
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