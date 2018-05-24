@extends('auth.base')
@section('title', 'Login')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('login') }}"><b>{{ config('app.name') }}</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Ingresa tus datos</p>
    <form action="{{ route('password.request') }}" method="POST">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error':'' }}">
        <input name="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error':'' }}">
        <input name="password" type="password" class="form-control" placeholder="Nueva contraseña" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error':'' }}">
        <input name="password_confirmation" type="password" class="form-control" placeholder="Nueva contraseña" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Restableces contraseña</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection