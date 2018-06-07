@extends('layouts.base')
@section('title','Ajustes')
@section('content')

@if(session()->has('info'))
    <div class="alert callout callout-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ session('info') }}</p>
    </div>
@endif

<div class="box box-info">

    <div class="box-header with-border"></div>

    <div class="box-body">

        <form method="POST" action="{{ route('options.update') }}" class="form-horizontal">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                <label for="name" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-desktop"></li></span>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $option->app_name }}" placeholder="Nombre" required>
                    </div>
                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error':''}}">
                <label for="description" class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-quote-left"></li></span>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $option->app_description }}" placeholder="Descripción" required>
                    </div>
                    {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error':''}}">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $option->app_email}}" placeholder="Email" required>
                    </div>
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error':''}}">
                <label for="phone" class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-phone"></li></span>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $option->app_phone }}" placeholder="Teléfono" required>
                    </div>
                    {!! $errors->first('phone','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                <label for="street" class="col-sm-2 control-label">Dirección</label>
                <div class="col-sm-3 {{ $errors->has('street') ? 'has-error':''}}">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-street-view"></li></span>
                        <input type="text" class="form-control" name="street" id="street" value="{{ $option->app_address_street }}" placeholder="Calle" required>
                    </div>
                    {!! $errors->first('street','<span class="help-block">:message</span>') !!}
                </div>
                <div class="col-sm-2 {{ $errors->has('number') ? 'has-error':''}}">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-slack"></li></span>
                        <input type="text" class="form-control" name="number" id="number" value="{{ $option->app_address_number }}" placeholder="#0000" required>
                    </div>
                    {!! $errors->first('number','<span class="help-block">:message</span>') !!}
                </div>
                <div class="col-sm-3 {{ $errors->has('commune') ? 'has-error':''}}">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-map-marker"></li></span>
                        <input type="text" class="form-control" name="commune" id="commune" value="{{ $option->app_address_commune }}" placeholder="Comuna" required>
                    </div>
                    {!! $errors->first('commune','<span class="help-block">:message</span>') !!}
                </div>
                <div class="col-sm-2 {{ $errors->has('country') ? 'has-error':''}}">
                    <div class="input-group">
                        <span class="input-group-addon"><li class="fa fa-globe"></li></span>
                        <input type="text" class="form-control" name="country" id="country" value="{{ $option->app_address_country }}" placeholder="País" required>
                    </div>
                    {!! $errors->first('country','<span class="help-block">:message</span>') !!}
                </div>
            </div>
        <button type="submit" class="btn btn-info pull-right">Editar</a>
        </form>
    </div>
</div>
@endsection