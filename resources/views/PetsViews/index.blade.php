@extends('layouts.base')
@section('title','Mascotas')
@section('content')

@if(session()->has('info'))
    <div class="alert callout callout-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ session('info') }}</p>
    </div>
@endif

@if(session()->has('delete'))
    <div class="alert callout callout-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('delete') }}
    </div>
@endif

<div class="box box-info">

    <div class="box-header with-border"></div>

    <div class="box-body">
        <a class="btn btn-primary float-right" href="{{ route('pets.create') }}" role="button">Agregar</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Especie</th>
                    <th scope="col">Raza</th>
                    <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pets as $pet)
                    <tr>
                    <td>{{$pet->name}}</td>
                    <td>{{$pet->birth_day}}</td>
                    <td>{{$pet->specie}}</td>
                    <td>{{$pet->race}}</td>
                    <td>
                        <a type="button" href="{{ route('pets.edit', $pet->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        <a type="button" href="{{ route('pets.show', $pet) }}" class="btn btn-default btn-sm"><i class="fa fa-map-marker"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection