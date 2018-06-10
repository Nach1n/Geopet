@extends('layouts.base')
@section('title','Mascota')
@section('content')

<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title">Localización</h3>
        <a href="{{ route('pets.edit', $pet) }}" class="btn btn-xs btn-info pull-right">Editar</a>
    </div>

    <div class="box-body">
        
    </div>
</div>
@endsection