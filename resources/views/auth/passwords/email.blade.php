@extends('auth.base')
@section('title', 'Login')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('login') }}"><b>{{ config('app.name') }}</b></a>
  </div>
  <div class="login-box-body">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('status') }}
        </div>
    @endif
    <p class="login-box-msg">Ingresa tus datos</p>
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error':'' }}">
        <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Restablecer contraseña</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection