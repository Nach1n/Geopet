@extends('layouts.base')
@section('title', 'Productos')

@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

@section('js')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>
<script>
  $(function () {
    $('#products-table').DataTable({
        "order":[]
    })
  })
</script>
@stop

@section('content')

@if(session()->has('info'))
    <div class="alert callout callout-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('info') }}
    </div>
@endif

@if(session()->has('delete'))
    <div class="alert callout callout-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('delete') }}
    </div>
@endif

<div class="box">

    <div class="box-body">
        <a href="{{ route('products.create') }}" class="btn btn-primary pull-right"><li class="fa fa-plus"></li> Agregar</a>
        <br>
        <br>
        <div class="table-responsive">
        <table id="products-table" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Banda</th>
            <th>Batería</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($products as $product)
            <tr>
                <td>{{ $product->brand_name }}</td>
                <td>{{ $product->model_name }}</td>
                <td>{{ $product->band }}</td>
                <td>{{ $product->battery }}</td>
                <td>
                    <a type="button" href="{{ route('products.edit', $product->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>

        </tfoot>
        </table>
        </div>
    </div>
</div>
@endsection