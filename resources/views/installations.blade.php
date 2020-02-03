@extends('master')

@section('title','Installation')

@section('content')
    <h1>Installation</h1>

    <p class="intro">Setup, installation and settings when starting a new project including errors with additional notes.</p>

<h2>Migration</h2>
<i>This is when we setup the database adding the tables to the database.  It's source control for Databasing.</i>
<p>We set the .env file, for connecting to the database, and we run the following artisan command to create a boilerplate for the table, ready to be setup. But first, for new projects by default two migrations are already created.</p>
<code>php artisan migrate</code>
<p>After this command two tables will be created, users and password, as mentioned its default. To add further tables we would.</p>
<code>php artisan make:migtrate create_table_name_table</code>
<p>This creates a migration file, which is located in <span class="directory">database/migrations/table_name</span> giving us a boilder template for our new tables.</p>
<p>Followed by</p>
<code>php artisan migrate</code>
<p>Should we decide to revert the changes we would use</p>
<code>php artisan migrate:rollback</code>
<p>However, if we make changes to the table, instead of running rollback and then migrate, we can also use</p>
<code>php artisan migrate:refresh</code>
<p>This command basically drops all the tables and reinstalls all the migrations</p>


@endsection