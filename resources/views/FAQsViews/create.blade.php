@extends('layouts.base')
@section('title', 'FAQs')
@section('content')
<div class="box box-info">

    <div class="box-body">
        <div class="box-header with-border">
            <h3 class="box-title">Agregar pregunta frecuente</h3>
        </div>

        <form class="form-horizontal" action="{{ route('faqs.store') }}" method="POST">
            {!! csrf_field() !!}
            <br>
            <div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
                <label for="title" class="col-sm-2 control-label">Pregunta</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-user" style="width:14px"></li></span>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="¿Qué es GeoPet?" required>
                    </div>
                    {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error':''}}">
                <label for="description" class="col-sm-2 control-label">Respuesta</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-commenting" style="width:14px"></li></span>
                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="GeoPet es un servicio..." required>
                    </div>
                    {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>

            <div class="form-group {{ $errors->has('published') ? 'has-error':''}}">
                <label for="published" class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-eye" style="width:14px"></li></span>
                        <select class="form-control" name="published" id="published" required>
                            <option value="1">Publicado</option>
                            <option value="0">No publicado</option>
                        </select>
                    </div>
                    {!! $errors->first('published','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>            
    </div>
</div>
<button type="submit" class="btn btn-primary pull-right">Agregar</button>
</form>
@endsection