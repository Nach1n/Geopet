@extends('layouts.base')
@section('title', 'Editar')
@section('content')

@if(session()->has('info'))
    <div class="alert callout callout-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ session('info') }}</p>
    </div>
@endif

<div class="col-md">
    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{{ $user->name . ' ' . $user->lastname }}</h3>
            <h5 class="widget-user-desc">{{ $user->role->display_name }}</h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{ Storage::url($user->avatar) }}" alt="Avatar">
        </div>
        <div class="box-footer">
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}

                <div class="form-group {{ $errors->has('avatar') ? 'has-error':''}}">
                    <label for="avatar" class="col-sm-2 control-label">Imagen</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><li class="fa fa-picture-o" style="width:14px;"></li></span>
                            <input type="file" class="form-control" name="avatar" id="avatar">
                        </div>
                        <span class="help-block">Tamaño máximo: 1mb</span>
                        {!! $errors->first('avatar','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error':''}}">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><li class="fa fa-envelope"></li></span>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>
                        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                    </div>                    
                </div>

                <div class="form-group {{ $errors->has('phone-number') ? 'has-error':''}}">
                    <label for="phone-number" class="col-sm-2 control-label">Teléfono</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><li class="fa fa-phone"></li></span>
                            <input type="text" class="form-control" name="phone-number" id="phone-number" value="{{ $user->phone_number }}">
                        </div>
                        {!! $errors->first('phone-number','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                    <label for="password" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><li class="fa fa-lock"></li></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nueva contraseña">
                        </div>
                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                    <label for="password_confirmation" class="col-sm-2 control-label">Confirmar contraseña</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><li class="fa fa-lock"></li></span>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Nueva contraseña">
                        </div>
                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                    Eliminar cuenta
                </button>
                <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="icon fa fa-warning"></i> ¿Quieres eliminar tu cuenta?</h4>
            </div>
            <div class="modal-body">
                <p>Si crees que no volverás a utilizar {{ config('app.name') }} y deseas eliminar tu cuenta, podemos ocuparnos de ello. Ten en cuenta que no podrás reactivar tu cuenta ni recuperar el contenido ni la información que hayas agregado. Haz clic en "Eliminar", en la parte de abajo, para eliminar tu cuenta de forma permanente.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Confirmar</button>
            </div>
        </div>
    </div>
</div>
@endsection