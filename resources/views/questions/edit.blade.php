@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ route('questions.update', $question->id) }}" method="post">
    @csrf
    @method('PUT')
    @include('extera.form', ['submitName' => 'Edit Question'])
  </form>
</div>
@endsection