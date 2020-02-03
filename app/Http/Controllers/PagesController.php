<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Command;
use App\Author;

class PagesController extends Controller
{
  //
	public function home(){
		$contents = [
			"Installation",
			"Basics",
			"Daily commands"
		];

    return view('home')->withContents($contents)->withTitle('Home using a controller');
	}

	public function tutorials(){
    return view('tutorials');
	}

	public function installations(){
    return view('installations');
	}

	public function commands(){
		// $commands = \App\Command::all();
		$commands = Command::all();
		// return $commands;

    return view('commands')->withCommands($commands);
	}

	public function showauthors(){
		// $commands = \App\Command::all();
		$authors = Author::all();
		// return $commands;

			foreach ($authors as $author) {
			    dd($author->command->title);
			}

	}

	/*
		Conventionally I would use Command $commands BUT
		https://stackoverflow.com/questions/46307094/route-model-binding-not-working

		Using Model Binding the function parameter needs to match the route wildcard

		Was passing as '$id' now '$command'

	*/
	public function commandsShow(Command $command){
		// Old approach when parameter is only '$id'
		//$command = Command::findOrFail($id); // now shows 404 but crashed if we only use find()

    // return view('commands.show')->withCommands($command); // can rename variable maybe? - withCommands
    return view('commands.show', compact('command')); // add variable $commands

	}

	public function commandsCreate(){
    return view('commands.create'); // Display the form
	}

	public function commandsEdit(Command $command){
		// $commands = Command::findOrFail($id); // now shows 404 but crashed if we only use find()
    return view('commands.edit', compact('command')); // Alternative approach but not working
	}

	public function commandsUpdate(Command $command){

		// $command = Command::findOrFail($id);
		// $command->title = request('title');
		// $command->introduction = request('introduction');
		// $command->code = request('code');
		// $command->save();

		$command->update(request(['title','introduction','code']));

		return redirect('/commands');
		// dd(request()->all());
		// return request()->all();

	}


	public function commandsDelete($id){
		Command::findOrFail($id)->delete();
		return redirect('/commands');
		dd('Delete command');
	}


	public function commandsStore(){
		/*
			$command = new Command();
			$command->title = request('title');
			$command->introduction = request('introduction');
			$command->code = request('code');
			$command->save();

			We can use instead

			Command::create([
				'field-name' => field-value,
				'field-name' => field-value
			])
		*/

		// Validate the fields which returns an array of valid fields
		$validFields = request()->validate([
			'title' => ['required','min:3'],
			'introduction' => 'required',
			'code' => 'required'
		]);

		Command::create(
			// request(['title','code','introduction']) // avoid repetition
			$validFields
		);

		return redirect('/commands');
		// return request()->all();

	}

	public function about(){
    return view('about');
	}

}
