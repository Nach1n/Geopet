@extends('auth.base')
@section('title', 'Registro')
@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('register') }}"><b>{{ config('app.name') }}</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrar cuenta</p>

    <form action="{{ route('register') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error':'' }}">
        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('lastname') ? 'has-error':'' }}">
        <input type="text" class="form-control" name="lastname" placeholder="Apellido" value="{{ old('lastname') }}" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        {!! $errors->first('lastname','<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error':'' }}">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('phone-number') ? 'has-error':'' }}">
        <input type="text" class="form-control" name="phone-number" placeholder="569 xxxx xxxx" value="{{ old('phone-number') }}" required>
        <span class="glyphicon glyphicon glyphicon-phone form-control-feedback"></span>
        {!! $errors->first('phone-number','<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error':'' }}">
        <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error':'' }}">
        <input name="password_confirmation" type="password" class="form-control" placeholder="Repetir Contraseña" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Acepto los <a href="#">terminos</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
    -->

    <a href="{{ route('login') }}" class="text-center">Ya tengo una cuenta</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection