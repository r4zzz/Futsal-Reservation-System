<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                    <div class="panel-body">
                        <form action="/login" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" name="email" class="form-control" placeholder="example@example.com" value="{{old('email')}}">
								
								</div>
									<div class="col-md-offset-1 ">
								@if ($errors->has('email'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							<div class="form-group {{session('error') ? 'has-error': ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
							</div>

                            
                            </div>
                            <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>
                            @if(session('error'))
								<div class="row">
								<div class="col-md-8 col-md-offset-1"><span class="text text-danger" >{{session('error')}}</span></div> 
							</div>
								@endif
                            <div>
                                <a class="btn btn-link" href="/forgot-password" style="background: lightgrey;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        </div>
    
    </div>
</div>
@stop