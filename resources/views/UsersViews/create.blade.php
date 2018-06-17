@extends('layouts.base')
@section('title', 'Agregar usuario')
@section('content')
<div class="box box-info">

    <div class="box-body">
        <div class="box-header with-border">
            <h3 class="box-title">Datos de usuario</h3>
        </div>

        <form class="form-horizontal" action="{{ route('users.store') }}" method="POST">
            {!! csrf_field() !!}
            <br>
            <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                <label for="name" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-user" style="width:14px"></li></span>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="John" required>
                    </div>
                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>

            <div class="form-group {{ $errors->has('lastname') ? 'has-error':''}}">
                <label for="lastname" class="col-sm-2 control-label">Apellido</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-user" style="width:14px"></li></span>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="Doe" required>
                    </div>
                    {!! $errors->first('lastname','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error':''}}">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-envelope" style="width:14px"></li></span>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="mi@email.com" required>
                    </div>
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>

            <div class="form-group {{ $errors->has('telegram_user') ? 'has-error':''}}">
                <label for="telegram_user" class="col-sm-2 control-label">Usuario telegram</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-send-o"></li></span>
                        <input type="text" class="form-control" name="telegram_user" id="telegram_user" value="{{ old('telegram_user') }}" placeholder="UsuarioTelegram">
                    </div>
                    {!! $errors->first('telegram_user','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>

            <div class="form-group {{ $errors->has('phone-number') ? 'has-error':''}}">
                <label for="phone-number" class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-phone" style="width:14px"></li></span>
                        <input type="text" class="form-control" name="phone-number" id="phone-number" value="{{ old('phone-number') }}" placeholder="569 xxxx xxxx" required>
                    </div>
                    {!! $errors->first('phone-number','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                <label for="password" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-lock" style="width:14px"></li></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                    </div>
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                <label for="password_confirmation" class="col-sm-2 control-label">Confirmar contraseña</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-lock" style="width:14px"></li></span>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Contraseña" required>
                    </div>
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                </div>
            </div>
            
    </div>
</div>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Rol</h3>
    </div>
    <div class="box-body">
    <div class="form-horizontal">
        <div class="form-group {{ $errors->has('rol') ? 'has-error':''}}">
            <label for="rol" class="col-sm-2 control-label">Elegir rol</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><li class="fa fa-key" style="width:14px"></li></span>
                    <select name="rol" class="form-control" required>
                        <option value="">Seleccionar una opción</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                    </select>

                </div>
                {!! $errors->first('rol','<span class="help-block">:message</span>') !!}
            </div>
        </div>
        </div>
    </div>
</div>
<!--
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Plan</h3>
    </div>
    <div class="box-body">
    <div class="form-horizontal">
        <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
            <label for="plan" class="col-sm-2 control-label">Eligir plan</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><li class="fa fa-cubes" style="width:14px"></li></span>
                    <select name="plan" class="form-control">
                        <option>Sin plan</option>
                        <option>Plan 2</option>
                        <option>Plan 3</option>
                        <option>Plan 4</option>
                        <option>Plan 5</option>
                    </select>
                </div>
                {!! $errors->first('plan','<span class="help-block">:message</span>') !!}
            </div>
        </div>
        </div>
    </div>
</div>
-->
<button type="submit" class="btn btn-primary pull-right">Agregar</button>
</form>
@endsection