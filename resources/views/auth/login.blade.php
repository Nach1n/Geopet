@extends('auth.base')
@section('title', 'Login')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('login') }}"><b>{{ config('app.name') }}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  @if($errors->has('email') || $errors->has('password'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Estas credenciales no coinciden con nuestros registros.
  </div>
  @endif
    <p class="login-box-msg">Ingresa tus datos</p>

    <form action="{{ route('login') }}" method="post">
      {!! csrf_field() !!}
      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error':'' }}">
        <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="E-mail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error':'' }}">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input name="remember" type="checkbox"> Recordar cuenta
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    -->
    <!-- /.social-auth-links -->
    <a href="{{ route('password.request') }}">¿Olvidaste tu cuenta?</a><br>
    <a href="{{ route('register') }}" class="text-center">Crear cuenta</a>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection