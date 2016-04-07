@extends('layouts.master')
@section('content')

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <img src="/images/logo.png" class="img-responsive logo">
                <h1 class="text-center">Eventsly</h1>
                <hr>

                <div class="col-md-4 col-md-offset-4" id="login">
                    @if($errors)
                        <div class="form-group col-xs-12 text-center" style="color:#DE615E;"> {{ $errors->first() }} 
                        </div> 
                    @endif
                     <form method="POST" action="/auth/login"> {!! csrf_field() !!}
                            <div class="form-group col-xs-12">
                                <label class="sr-only" for="username">Username</label>
                                <input type="username" name="username" value="{{ old('username') }}" placeholder="Enter your username..." class="form-control" autofocus> </div>
                            <div class="form-group col-xs-12">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-control"> </div>
                            <div class="form-group col-xs-12" style="text-align: center;">
                                <button type="submit" class="btn btn-danger">Log in</button>
                            </div>
                        </form>
                </div>

                <p style="font-size:14px;">
                Admin username: <strong>admin</strong> <br>
                Password: <strong>admin</strong>
                </p>
            </div>
        </div>
    </header>
    
@stop
