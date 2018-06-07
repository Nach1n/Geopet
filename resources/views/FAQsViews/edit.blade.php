@extends('layouts.base')
@section('title', 'Editar')
@section('content')

@if(session()->has('info'))
    <div class="alert callout callout-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ session('info') }}</p>
    </div>
@endif

<div class="box box-info">
    <div class="box-body">
        <form class="form-horizontal" method="POST" action="{{ route('faqs.update', $faq->id) }}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
                <label for="title" class="col-sm-2 control-label">Título</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-envelope"></li></span>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $faq->title }}">
                    </div>
                    {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                </div>                    
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error':''}}">
                <label for="description" class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-commenting"></li></span>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $faq->description }}">
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
                            <option value="1" @if($faq->published === 1) selected @endif>Publicado</option>
                            <option value="0" @if($faq->published !== 1) selected @endif>No publicado</option>
                        </select>
                    </div>
                    {!! $errors->first('published','<span class="help-block">:message</span>') !!}
                </div>                    
            </div> 
            <br>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                Eliminar pregunta
            </button>
            <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="icon fa fa-warning"></i> ¿Quieres eliminar la pregunta frecuente?</h4>
            </div>
            <div class="modal-body">
                <p>¿Estas seguro de realizar esta acción?. Haz clic en Confirmar.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{route('faqs.destroy', $faq->id)}}">
                    {{csrf_field()}}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection