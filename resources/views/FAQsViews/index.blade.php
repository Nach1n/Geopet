@extends('layouts.base')
@section('title','FAQs')
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
        <a class="btn btn-primary float-right" href="{{ route('faqs.create') }}" role="button">Agregar</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($FAQs as $FAQ)
                    <tr>
                    <td>{{$FAQ->title}}</td>
                    <td>{{$FAQ->description}}</td>
                    @if($FAQ->published === 1)
                    <td>Publicado</td>
                    @else
                    <td>No publicado</td>
                    @endif
                    <td><a type="button" href="{{ route('faqs.edit', $FAQ->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection