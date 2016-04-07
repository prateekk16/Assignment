<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="_token" content="{!! csrf_token() !!}" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description"
		content="Welcome to Eventsly">
		<meta name="author" content="Prateek Singh">
		<title>@yield('meta-title', 'Eventsly')</title>
		<link rel="icon" type="image/png" sizes="96x96" href="/images/logo.png">
		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		@section('header')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/sweetalert.css">
		<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
		@show
	</head>
	<body>
		<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="{{URL::to('/')}}">Eventsly</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						@if(!Request::is('/'))
						<li>
							<a class="page-scroll" href="{{URL::to('/')}}">Home</a>
						</li>
						@else
						<li>
							<a class="page-scroll" href="#events">Events</a>
						</li>
						@endif
						@if(auth()->check())
                   			@if(auth()->user()->hasRole('admin'))
                   			<li>
                   				<a href="{{ URL::to('/admin/show-subscribers') }}"> 
								Subscribers </a>
							</li>
                   			@endif
                   		@endif
						<li>
						@if(\Auth::check())
							<a class="page-scroll" href="{{ URL::to('auth/logout') }}">Logout</a>
						@else
							<a class="page-scroll" href="{{ URL::route('login_path') }}">Admin</a>
						@endif
						</li>
					</ul>
				</div>
			</div>
		</nav>
		@yield('content')

		<footer class="container-fluid text-center" style="margin-top:100px;">
			<p style="padding-top:50px;font-size:10px;">
				Made with <span class="glyphicon glyphicon-heart" style="color:red;font-size:10px;"></span> by <a href="https://uk.linkedin.com/in/prateek01"> Prateek Singh. </a>
			</p>
			<h6 style="font-size:8px;"> Science Icons graphic by <a href="http://www.freepik.com/">Freepik</a> from <a href="http://www.flaticon.com/">Flaticon</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a></h6>
		</footer>
		
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/sweetalert.min.js"></script>
		<script src="/js/ajax-calls.js"></script>
		<script src="/js/app.js"></script>
		<script src="/js/modal-steps.js"></script>
		<script> $('#create').modalSteps(); </script>
	</body>
</html>