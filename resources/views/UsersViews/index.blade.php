@extends('layouts.base')
@section('title', 'Usuarios')

@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

@section('js')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>
<script>
  $(function () {
    $('#users-table').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
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


<div class="box">

    <div class="box-body">
        <a href="{{ route('users.create') }}" class="btn btn-primary pull-right"><li class="fa fa-plus"></li> Agregar</a>
        <br>
        <br>        
        <table id="users-table" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a type="button" href="{{ route('users.edit', $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                    <form class="inline" action="{{ route('users.destroy', $user->id ) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

        </tfoot>
        </table>
    </div>
</div>
@endsection