@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="post">
    @csrf
    @method('PUT')
    <label for="">text body : </label>
    <textarea name="body" class="form-control" cols="30" rows="10">
        {{ old('body', $answer->body) }}
      </textarea>
    <input type="submit" name="submit" value="Update" class="btn btn-info mt-2">
  </form>
</div>
@endsection