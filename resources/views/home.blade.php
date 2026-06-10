@extends('layouts.app') {{--Extend main layout from app.blade.php--}}
@section('content')
<main>
	<div class="box">
		@php
		//Get the user's role
		$role=auth()->user()->role;
        $roleName='User';
		if ($role==='admin'){
			$roleName='Admin';
		} elseif ($role==='user'){
			$roleName='User';
		}
		@endphp
		{{--Welcome message with the user's name and role--}}
		<h3>Welcome to Foundist Hub, dear {{auth()->user()->name}} !</h3>
		<h4><i>You've logged in as {{$roleName}}.</i></h4>
		<p>Add. Search. Reclaim - all in one place.</p>
	</div>
	<div class="button-container">
		<a class="button" href="{{route('items')}}"><img src="lostfound.png" style="width: 150px; vertical-align: middle; margin-right: 10px;">Add Lost/Found Item</a>
		<a class="button" href="{{route('items.view')}}"><img src="view.png" style="width: 140px; vertical-align: middle; margin-right: 10px;">View Items</a>
	</div>
</main>
@endsection