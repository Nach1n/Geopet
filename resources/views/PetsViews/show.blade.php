@extends('layouts.base')
@section('title','Mascota')
@section('content')

<div class="col-md-9">
    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">Localización</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('img/map.jpg') }}" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">Mascota</h3>
            <a href="{{ route('pets.edit', $pet) }}" class="btn btn-xs btn-info pull-right">Editar</a>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ Storage::url($pet->avatar) }}" height="100px" style="border-radius:50%">
                    <p>{{ $pet->name }}</p>
                    <p>{{ $pet->birth_day }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection