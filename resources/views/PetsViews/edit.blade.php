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
            <h3 class="widget-user-username">{{ $pet->name }}</h3>
            <h5 class="widget-user-desc">{{ $pet->birth_day }}</h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{ Storage::url($pet->avatar) }}" alt="Avatar">
        </div>
        <div class="box-footer">
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('pets.update', $pet) }}" enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                {!! csrf_field() !!}

                <div class="form-group {{ $errors->has('avatar') ? 'has-error':''}}">
                    <label for="avatar" class="col-sm-3 control-label">Imagen</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><li class="fa fa-picture-o" style="width:14px;"></li></span>
                            <input type="file" class="form-control" name="avatar" id="avatar">
                        </div>
                        <span class="help-block">Tamaño máximo: 1mb</span>
                        {!! $errors->first('avatar','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                    <label for="name" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $pet->name }}" required>
                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                    </div>                    
                </div>

                <div class="form-group {{ $errors->has('birth_day') ? 'has-error':''}}">
                    <label for="birth_day" class="col-sm-3 control-label">Fecha de nacimiento</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="birth_day" id="birth_day" value="{{ $pet->birth_day }}">
                        {!! $errors->first('birth_day','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('specie') ? 'has-error':''}}">
                    <label for="specie" class="col-sm-3 control-label">Especie</label>
                    <div class="col-sm-8">
                            <input type="text" class="form-control" name="specie" id="specie" value="{{ $pet->specie }}">
                        {!! $errors->first('specie','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('race') ? 'has-error':''}}">
                    <label for="race" class="col-sm-3 control-label">Raza</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="race" id="race" value="{{ $pet->race }}">
                        {!! $errors->first('race','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('sex') ? 'has-error':''}}">
                    <label for="sex" class="col-sm-3 control-label">Sexo</label>
                    <div class="col-sm-8">
                        <select name="sex" id="sex" class="form-control">
                            <option value="1" @if($pet->sex === 1) selected @endif>Masculino</option>
                            <option value="0" @if($pet->sex === 0) selected @endif>Femenino</option>
                        </select>
                        {!! $errors->first('sex','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('color') ? 'has-error':''}}">
                    <label for="color" class="col-sm-3 control-label">Color</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="color" id="color" value="{{ $pet->color }}" required>
                        {!! $errors->first('color','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('reproductive_status') ? 'has-error':''}}">
                    <label for="reproductive_status" class="col-sm-3 control-label">Estado reproductivo</label>
                    <div class="col-sm-8">
                        <select name="reproductive_status" id="reproductive_status" class="form-control">
                            <option value="1" @if($pet->reproductive_status === 1) selected @endif>Fértil</option>
                            <option value="0" @if($pet->reproductive_status === 0) selected @endif>No fértil</option>
                        </select>
                        {!! $errors->first('reproductive_status','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error':''}}">
                    <label for="description" class="col-sm-3 control-label">Descripción</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="description" id="description" rows="5">{{$pet->description}}</textarea>
                        {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <br>
        </div>
    </div>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
        Eliminar
    </button>
    <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
</form>
</div>

<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="icon fa fa-warning"></i> ¿Quieres eliminar tu mascota?</h4>
            </div>
            <div class="modal-body">
                <p>Sí estas seguro que deseas eliminar a tu mascota haz clic en Confirmar.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('pets.destroy', $pet) }}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection