<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
  // When we use Command::create, this protects the app from unknown field submits, below, define which fields we accept
	protected $fillable = ['command_id', 'author'];

	public function command()
	{
		return $this->belongsTo(Command::class);
	}
}
