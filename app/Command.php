<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
  // When we use Command::create, this protects the app from unknown field submits, below, define which fields we accept
	protected $fillable = ['title', 'introduction', 'code'];

	public function authors(){
		return $this->hasMany(Author::class);
	}

	public function addAuthor($author){

		// return Author::create([
		// 	'command_id' => $this->id,
		// 	'author' => $author
		// ]);

		/*
			Alternatively since Command has a relationship with authors
			Laravel will automatically apply the command_id based on the current instance of the object

		*/
		$this->authors()->create(compact('author'));


	}
}
