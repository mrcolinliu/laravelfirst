@extends('master')

@section('title','Step by Step')

@section('content')

  <h1>Step by Step</h1>
  <p class="intro">Tutorials, notes and guidelines a compilation of notes that needs a little more than a line to explain.</p>

  <section>
		<h2>File stuctures</h2>
		<i>Here we have a simple quick over the files we will come across on a day to day giving us an explaination of their use within Laravel5.</i>

		<h4>Models</h4>
		<span class="directory">/modelFileName</span>
		<p>M of MVC, from database models to migrations</p>

		<h4>Views</h4>
		<span class="directory">/resources/views</span>
		<p>The V of MVC, we create the blade html files here.</p>

		<h4>Controllers</h4>
		<span class="directory">/http/controllers</span>
		<p>C of MVC, where do we take users and what actions do we take.</p>

		<h4>Routes</h4>
		<span class="directory">/http/routes/web.php</span>
		<p>As from ver 5.3, Importantly this is where we contol the URL actions</p>

		<h4>SASS SCSS</h4>
		<span class="directory">/resources/sass/app.scss</span>
		<p>By default SASS is setup so focus with the scss file and you should not need to edit the css file directly</p>

  </section>

	<section>
		<h2>What we have done for most Apps</h2>
		<i>For the majority of our Laravel projects we would</i>
		<ol>
			<li>Setup models and migrations</li>
			<li>Setup views</li>
			<li>Setup controller</li>
			<li>Setup routes</li>
		</ol>


		<h5>3. Setup views</h5>
		<p>Remember when we are creating view blade files, we create these manually, no php artisan command here</p>

	</section>

	<section>
		<h2>Eloquent, Namespacing, and MVC - Chapter 8</h2>
		<i>Once we have the tables migrated, its table stucture setup in the database, we then talk about the models. This is the 'M'of MVC</i>
		<p>The command for creating the model would be</p>
		<code>php artisan make:model Command</code>
		<p>Do note, a model represents a row and not rows in a table.</p>
		<p>With namespacing, everything will start off from 'App', so in this instance for our Command model, we have:</p>
		<code>\App\Command::all()</code>
		<p>This points to the Command model, created using the make:model command, where the above commands pulls out all the records from the Command table.</p>

	</section>


	<section>
		<h2>Form handling in Laravel - Chapters 10 to 13</h2>
		<i>Creating forms in Laravel can be simple, as demonstrated below, if we follow RESTful conventions and adding a few code here and there.</i>

		<p>When creating a form, for saving POST content, we shall:</p>
		<ol>
			<li>Create the required route, Route::post, which responds to the POST submit.</li>
			<li>Create the required view, manually, along with the HTML form.</li>
			<li>Create the required controller, including namespace i.e App/Command, we create a new instance and save the content</li>
		</ol>

		<h5>1. Create the required route</h5>
		<p>As with any endpoint, we create the route but in this instance, we create a POST endpoint.</p>
		<code>Route::post('/commands', 'PagesController@commandsStore');</code>
		<p>post('/commands'), will only respond to POST requests, therefore this will clash with get('/commands')</p>

		<h5>2. Create the required view</h5>
		<p>When we create any form, by default we need to add - <code>@ csrf</code> to the HTML, this automatically creates a layer of security, preventing any Cross-Site Request Forgery. You can view the source code and see the additional code being added.</p>

		<h5>3. Create the required controller</h5>
		<p>This is where all the input is processed, excluding validation, so to submit the content we:</p>

		<ul>
			<li>Add references to the namespace model in this instance <code>use App\Command;</code></li>
			<li>Create the function which is being called <code>public function commandsStore(){}</code></li>
			<li>Reference the posted content we can use <code>request('field-name')</code> all fields we can use <code>$request()-all()</code></li>
			<li>Within the function, to save the content we:
				<code>$command = new Command();</code>
				<code>$command->field-name = request('field-name');</code>
				<code>$command->save();</code>
			</li>
		</ul>


		<p>Similar to POST content, for saving and edit we will PATCH content, so we:</p>
		<ol>
			<li>Create the required route, Route::patch, which responds to the PATCH submit.</li>
			<li>Create the required view, manually, along with the HTML form.</li>
			<li>Create the required controller, including namespace i.e App/Command, we find the instance and update the content</li>
		</ol>

		<h5>1. Create the required route</h5>
		<p>Similar to POST, we create the route but in this instance, we create a PATCH endpoint adding the content 'id'.</p>
		<code>Route::patch('/commands/{id}', 'PagesController@commandsUpdate');</code>

		<h5>2. Create the required view</h5>
		<p>When we create any form, by default we need to add - <code>@ csrf</code> to the HTML, this automatically creates a layer of security, preventing any Cross-Site Request Forgery. And for this instance, since HTML do not know about patch, we continue to use POST but tell Laravel this form is actually a PATCH.  To do this we also add <code>@ method('PATCH')</code>.  You can view the source code and see the additional code being added.</p>

		<h5>3. Create the required controller</h5>
		<p>This is where all the input is processed, excluding validation, so difference to POST we find the existing record:</p>

		<code>$command = Command::findOrFail($id);</code>
		<p>Replaces</p>
		<code>$command = new Command();</code><br />


	</section>


@endsection