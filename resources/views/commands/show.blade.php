@extends('master')

@section('title','Commands')

@section('content')

  <h1>Commands - {{ $command->title }}</h1>

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)

          <li>{{ $error }}</li>

        @endforeach

      </ul>
    </div>
  @endif

  <p>{{ $command->introduction }}</p>
  <code>{{ $command->code }}</code>

  @if ($command->authors->count() > 0)
<a href="/commands/{{ $command->id }}/edit">Edit</a>

  <div>
  <p>Authors</p>
  <div>
  	<ul>
  	@foreach($command->authors as $author)
  		<li>{{ $author->author }}</li>
  	@endforeach
  	</ul>
  </div>
  @endif
  <div>

  <form method="post" action="/commands/{{ $command->id }}/authors">
    @csrf

		<div class="form-group">
			<label for="author">Author</label>
  		<input id="author" value="{{ old('author') }}" type="text" name="author" placeholder="Add an author" class="{{ $errors->has('author') ? 'alert-danger' : '' }}">
  	</div>
  		<input class="btn btn-primary" type="submit" name="Add author">
  </form>


@endsection