@extends('layouts.base')
@section('title', 'Editar producto')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('info'))
    <div class="alert callout callout-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ session('info') }}</p>
    </div>
@endif

<div class="box box-info">
 
    <div class="box-body">
        <div class="box-header with-border">
            <h3 class="box-title">Datos del producto</h3>
        </div>

        <form class="form-horizontal" action="{{ route('products.update', $product->id ) }}" method="POST" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
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

            <div class="form-group {{ $errors->has('brand_name') ? 'has-error':''}}">
                <label for="brand_name" class="col-sm-3 control-label">Marca (*)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="brand_name" id="brand_name" value="{{ $product->brand_name }}" placeholder="Marca" required>
                    {!! $errors->first('brand_name','<span class="help-block">:message</span>') !!}
                </div>    
            </div>

            <div class="form-group {{ $errors->has('model_name') ? 'has-error':''}}">
                <label for="model_name" class="col-sm-3 control-label">Modelo (*)</label>
                <div class="col-sm-8 ">
                    <input type="text" class="form-control" name="model_name" id="model_name" value="{{ $product->model_name }}" placeholder="Modelo" required>
                    {!! $errors->first('model_name','<span class="help-block">:message</span>') !!}
                </div> 
            </div>

            <div class="form-group {{ $errors->has('network') ? 'has-error':''}}">
                <label for="network" class="col-sm-3 control-label">Red</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="network" id="network" value="{{ $product->network }}" placeholder="Red">
                    {!! $errors->first('network','<span class="help-block">:message</span>') !!}
                </div>                   
            </div>

            <div class="form-group {{ $errors->has('band') ? 'has-error':''}}">
                <label for="band" class="col-sm-3 control-label">Frecuencia (*)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="band" id="band" value="{{ $product->band }}" placeholder="Frecuencia" required>
                    {!! $errors->first('band','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('comunication_protocol') ? 'has-error':''}}">
                <label for="comunication_protocol" class="col-sm-3 control-label">Protocolo de comunicación (*)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="comunication_protocol" id="comunication_protocol" value="{{ $product->comunication_protocol }}" placeholder="Protocolo de comunicación" required>
                    {!! $errors->first('comunication_protocol','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('gps_chip') ? 'has-error':''}}">
                <label for="gps_chip" class="col-sm-3 control-label">Chip GPS</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="gps_chip" id="gps_chip" value="{{ $product->gps_chip }}" placeholder="Chip GPS">
                    {!! $errors->first('gps_chip','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('gps_accuracy') ? 'has-error':''}}">
                <label for="gps_accuracy" class="col-sm-3 control-label">Precisión GPS (*)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="gps_accuracy" id="gps_accuracy" value="{{ $product->gps_accuracy }}" placeholder="Precisión GPS" required>
                    <span class="help-block">Precisión expresada en metros.</span>
                    {!! $errors->first('gps_accuracy','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('car_charger') ? 'has-error':''}}">
                <label for="car_charger" class="col-sm-3 control-label">Cargador de vehículo</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="car_charger" id="car_charger" value="{{ $product->car_charger }}" placeholder="Cargador de vehículo">
                    {!! $errors->first('car_charger','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('wall_charger') ? 'has-error':''}}">
                <label for="wall_charger" class="col-sm-3 control-label">Cargador de pared</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="wall_charger" id="wall_charger" value="{{ $product->wall_charger }}" placeholder="Cargador de pared">
                    {!! $errors->first('wall_charger','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('battery') ? 'has-error':''}}">
                <label for="battery" class="col-sm-3 control-label">Capacidad de la batería (*)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="battery" id="battery" value="{{ $product->battery }}" placeholder="Batería" required>
                    {!! $errors->first('battery','<span class="help-block">:message</span>') !!}
                </div> 
            </div>

            <div class="form-group {{ $errors->has('battery_life') ? 'has-error':''}}">
                <label for="battery_life" class="col-sm-3 control-label">Duración de la batería (*)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="battery_life" id="battery_life" value="{{ $product->battery_life }}" placeholder="Duración de la batería uso continuo" required>
                    <span class="help-block">Cantidad de horas de uso continuo.</span>
                    {!! $errors->first('battery_life','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('standby') ? 'has-error':''}}">
                <label for="standby" class="col-sm-3 control-label">Standby (*)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="standby" id="standby" value="{{ $product->standby }}" placeholder="Duración de la batería en modo reposo" required>
                    {!! $errors->first('standby','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('cpu') ? 'has-error':''}}">
                <label for="cpu" class="col-sm-3 control-label">CPU</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="cpu" id="cpu" value="{{ $product->cpu }}" placeholder="CPU">
                    {!! $errors->first('cpu','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('certificate') ? 'has-error':''}}">
                <label for="certificate" class="col-sm-3 control-label">Certificado</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="certificate" id="certificate" value="{{ $product->certificate }}" placeholder="Certificado">
                    {!! $errors->first('certificate','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('item_size') ? 'has-error':''}}">
                <label for="item_size" class="col-sm-3 control-label">Dimensiones (*)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="item_size" id="item_size" value="{{ $product->item_size }}" placeholder="Dimensiones" required>
                    {!! $errors->first('item_size','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('weight') ? 'has-error':''}}">
                <label for="weight" class="col-sm-3 control-label">Peso (*)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="weight" id="weight" value="{{ $product->weight }}" placeholder="Peso" required>
                    <span class="help-block">Peso expresado en gramos.</span>
                    {!! $errors->first('wight','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('gps_module') ? 'has-error':''}}">
                <label for="gps_module" class="col-sm-3 control-label">Modulo GPS</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="gps_module" id="gps_module" value="{{ $product->gps_module }}" placeholder="Modulo GPS">
                    {!! $errors->first('gps_module','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('operation_temp') ? 'has-error':''}}">
                <label for="operation_temp" class="col-sm-3 control-label">Temperatura de Operación</label>
                <div class="col-sm-8">
                    <input type="operation_temp" class="form-control" name="operation_temp" id="operation_temp" value="{{ $product->operation_temp }}" placeholder="Temperatura de operación">
                    {!! $errors->first('operation_temp','<span class="help-block">:message</span>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('price') ? 'has-error':''}}">
                <label for="price" class="col-sm-3 control-label">Precio (*)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" placeholder="Precio" required>
                    {!! $errors->first('price','<span class="help-block">:message</span>') !!}
                </div>
            </div>                    

            <div class="form-group {{ $errors->has('published') ? 'has-error':''}}">
                <label for="published" class="col-sm-3 control-label">Estado</label>
                <div class="col-sm-8">
                    <select name="published" id="published" class="form-control">
                        <option value="1" selected>Publicado</option>
                        <option value="0">No publicado</option>
                    </select>
                    {!! $errors->first('published','<span class="help-block">:message</span>') !!}
                </div>
            </div>   
        </div>
</div>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
    Eliminar
</button>
<button type="submit" class="btn btn-primary pull-right">Actualizar</button>
</form>

<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="icon fa fa-warning"></i> ¿Quieres eliminar el producto?</h4>
            </div>
            <div class="modal-body">
                <p>Sí estas seguro de realizar esta acción, haz clic en Confirmar.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection