@extends('master')

@section('title','Commands')

@section('content')

  <h1>Commands - edit this command</h1>

  <p class="intro">Let us update a command using Laravel forms.</p>

  <form method="post" action="/commands/{{ $command->id }}" style="margin-bottom: 10px;">
  {{-- Tells Laravel this is a PATCH submit not POST --}}
    @method('PATCH')

    @csrf

  	<div>
  		<input type="text" name="title" placeholder="Title of command" value="{{ $command->title }}">
  	</div>

  	<div>
			<textarea name="introduction" placeholder="Describe the command...">{{ $command->introduction }}</textarea>
  	</div>

  	<div>
  		<input type="text" name="code" placeholder="php artisan make:controller" value="{{ $command->code }}">
  	</div>

  	<div>
  		<input type="submit" value="Update command">
  	</div>


  </form>

  <form method="post" action="/commands/{{ $command->id }}">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}

    <div>
      <input type="submit" value="DELETE command">
    </div>


  </form>

@endsection