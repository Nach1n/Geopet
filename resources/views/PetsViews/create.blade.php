@extends('layouts.base')
@section('title', 'Agregar mascota')
@section('content')
<div class="box box-info">
 
    <div class="box-body">
        <div class="box-header with-border">
            <h3 class="box-title">Datos de la mascota</h3>
        </div>

        <form class="form-horizontal" action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <br>

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
                <label for="name" class="col-sm-3 control-label">Nombre (*)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre" required>
                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                </div>    
            </div>

            <div class="form-group {{ $errors->has('birth_day') ? 'has-error':''}}">
                <label for="birth_day" class="col-sm-3 control-label">Fecha de nacimiento </label>
                <div class="col-sm-8 ">
                    <input type="text" class="form-control" name="birth_day" id="birth_day" value="{{ old('birth_day') }}" placeholder="Fecha de nacimiento">
                    {!! $errors->first('birth_day','<span class="help-block">:message</span>') !!}
                </div> 
            </div>

            <div class="form-group {{ $errors->has('specie') ? 'has-error':''}}">
                <label for="specie" class="col-sm-3 control-label">Especie</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="specie" id="specie" value="{{ old('specie') }}" placeholder="Especie">
                    {!! $errors->first('specie','<span class="help-block">:message</span>') !!}
                </div>                   
            </div>

            <div class="form-group {{ $errors->has('race') ? 'has-error':''}}">
                <label for="race" class="col-sm-3 control-label">Raza</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="race" id="race" value="{{ old('race') }}" placeholder="Raza" required>
                    {!! $errors->first('race','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('sex') ? 'has-error':''}}">
                <label for="sex" class="col-sm-3 control-label">Sexo (*)</label>
                <div class="col-sm-8">
                    <select name="sex" id="sex" class="form-control">
                        <option value="1" selected>Masculino</option>
                        <option value="0">Femenino</option>
                    </select>
                    {!! $errors->first('sex','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('color') ? 'has-error':''}}">
                <label for="color" class="col-sm-3 control-label">Color</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="color" id="color" value="{{ old('color') }}" placeholder="Color">
                    {!! $errors->first('color','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('reproductive_status') ? 'has-error':''}}">
                <label for="reproductive_status" class="col-sm-3 control-label">Estado reproductivo (*)</label>
                <div class="col-sm-8">
                    <select name="reproductive_status" id="reproductive_status" class="form-control">
                        <option value="1" selected>Fértil</option>
                        <option value="0">No fértil</option>
                    </select>
                    {!! $errors->first('reproductive_status','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error':''}}">
                <label for="description" class="col-sm-3 control-label">Descripción</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                    {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary pull-right">Agregar</button>
</form>
@endsection