@extends('master')

@section('title','Commands')

@section('content')

<article>

  <h1>Commands for daily use</h1>

  <p class="intro">Daily commands that come in handy during our work. Simple but sometimes can easily be forgotten.</p>

	{{-- <section>
		<h2>Sublime specific</h2>
		<p>Find a specific file</p>
		<code>CTRL p</code>
	</section>


	<section>
		<h2>help</h2>
		<p>Unsure how we should use the command add help</p>
		<code>php artisan help make:migration</code>
	</section>

	<section>
		<h2>make:migration</h2>
		<p>Creating a migrations file for a new table</p>
		<code>php artisan make:migration create_projects_table</code>
	</section> --}}

@foreach($commands as $command)
	<section>
		<h2>
			<a href="/commands/{{$command->id}}">
			{{$command->title}}
			</a>
		</h2>
		<p>{{$command->introduction}}</p>
		<code>{{$command->code}}</code>
	</section>

@endforeach


</article>

@endsection