@extends('layouts.base')
@section('title','Cuenta')
@section('content')

<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title">Mis Datos</h3>
    </div>

    <div class="box-body">

        <form class="form-horizontal">

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" value="{{ $user->email}}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="telegram" class="col-sm-2 control-label">Usuario telegram</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-send-o"></i></span>
                        <input type="text" class="form-control" id="telegram" value="{{ $user->telegram_user }}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" value="password" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-phone"></li></span>
                        <input type="phone" class="form-control" id="phone" value="{{ $user->phone_number }}" disabled>
                    </div>
                </div>
            </div>

        </form>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-right">Editar</a>
    </div>
</div>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Información del plan</h3>
    </div>

    <div class="box-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="plan" class="col-sm-2 control-label">Plan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="plan" value="Plan Ilimitado" disabled>
                </div>
            </div>
        </form>
        <a href="#" class="btn btn-warning pull-right">Actualizar</a>
    </div>

</div>
@endsection