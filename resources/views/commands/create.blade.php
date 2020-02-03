@extends('master')

@section('title','Commands')

@section('content')

  <h1>Commands - adding a new one</h1>

  <p class="intro">Let us create a new command using Laravel forms.</p>

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)

          <li>{{ $error }}</li>

        @endforeach

      </ul>
    </div>
  @endif

  <form method="post" action="/commands">
    @csrf

  	<div>
  		<input value="{{ old('title') }}" type="text" name="title" placeholder="Title of command" class="{{ $errors->has('title') ? 'alert-danger' : '' }}" required>
  	</div>

  	<div>
			<textarea name="introduction" placeholder="Describe the command..." required></textarea>
  	</div>

  	<div>
  		<input value="{{ old('code') }}" type="text" name="code" placeholder="php artisan make:controller"  required>
  	</div>

  	<div>
  		<input type="submit" name="Add command">
  	</div>


  </form>


@endsection