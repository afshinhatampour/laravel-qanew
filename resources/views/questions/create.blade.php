@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ route('questions.store') }}" method="post">
    @include('extera.form', ['submitName'=> 'Ask Question'])
  </form>
</div>
@endsection