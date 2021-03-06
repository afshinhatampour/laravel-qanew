@csrf
<div class="form-group">
  <label for="question-title">Question Title</label>
  <input 
  value="@if (isset($question))
  {{ $question->title }}
@else
  {{ old('title') }}
@endif" 
  type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="question-title">
  @if ($errors->has('title'))
  <div class="invalid-feedback">
    <strong>{{ $errors->first('title') }}</strong>
  </div>
  @endif
</div>
<div class="form-group">
  <label for="question-body">Explain your question</label>
  <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" class="body" rows="10" id="question-body">
    @if (isset($question))
        {{ $question->body }}
    @else
        {{ old('body') }}
    @endif
  </textarea>
  @if ($errors->has('title'))
  <div class="invalid-feedback">
    <strong>{{ $errors->first('body') }}</strong>
  </div>
  @endif
</div>
<input type="submit" class="btn btn-info" name="submit" value="{{ $submitName }}">