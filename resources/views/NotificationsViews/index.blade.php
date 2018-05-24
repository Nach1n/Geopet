@extends('layouts.base')
@section('title', 'Notificaciones')

@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>
<script>
    $(function () {
        $('#notifications-table').DataTable()
    })
</script>
@endsection

@section('content')
<div class="box">
    <div class="box-body">
        <table id="notifications-table" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Trident</td>
            <td>Internet
            Explorer 4.0
            </td>
            <td>Win 95+</td>
            <td> 4</td>
            <td>X</td>
        </tr>
        </tbody>

        </tfoot>
        </table>
    </div>
</div>
@endsection