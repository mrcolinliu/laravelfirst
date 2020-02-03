@extends('master')

@section('title','Home')

@section('content')

    <h1>Home page</h1>


    <ul>
    	@foreach($contents as $content)
    		<li>{{$content}}</li>
    	@endforeach
    </ul>
@endsection