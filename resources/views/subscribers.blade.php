@extends('layouts.master')
@section('content')


<div class="jumbotron" >
	<div class="row" style="padding-top: 40px;">
		<div class="col-md-8 col-md-offset-2">
			<img src="/images/logo.png" class="img-responsive logo">
			<h3 class="text-center">Eventsly</h3>
            <hr>
            <p> List of all the Subscribers.</p>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<strong>Event Name</strong>
			</div>
			<div class="col-md-4">
				<strong>Subscriber Name</strong>
			</div>
			<div class="col-md-4">
				<strong>Subscriber Email</strong>
			</div>
			<hr>
		@foreach($events as $event)
			@foreach($event->subscribers as $user)
				<div class="subscribers-wrapper">
					<div class="col-md-4">
					{{ $event->name }}
					</div>
					<div class="col-md-4">
					{{ $user->name }}
					</div>
					<div class="col-md-4">
					{{ $user->email }}
					</div>
				</div>
			@endforeach
		@endforeach
		</div>
	</div>
</div>

@stop