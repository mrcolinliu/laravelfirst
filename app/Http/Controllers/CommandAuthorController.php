<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;
use App\Command;

class CommandAuthorController extends Controller
{

  // URI - /commands/{command}/authors
	public function store(Command $command){

		// Validate the fields which returns an array of valid fields
		$validFields = request()->validate([
			'author' => ['required','min:3']
		]);

		// Author::create([
		// 	'command_id' => $command->id,
		// 	'author' => request('author')
		// ]);

		$command->addAuthor($validFields);


		return back();


	}


}
