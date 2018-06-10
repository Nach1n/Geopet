@extends('layouts.base')
@section('title', 'Dashboard')
@section('content')
<div class="row">
<div class="col-md-8">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Orders</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
        <table class="table no-margin">
            <thead>
            <tr>
            <th>Order ID</th>
            <th>Item</th>
            <th>Status</th>
            <th>Popularity</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td><a href="pages/examples/invoice.html">OR9842</a></td>
            <td>Call of Duty IV</td>
            <td><span class="label label-success">Shipped</span></td>
            <td>
                10
            </td>
            </tr>
            <tr>
            <td><a href="pages/examples/invoice.html">OR1848</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="label label-warning">Pending</span></td>
            <td>
                10
            </td>
            </tr>
            <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>iPhone 6 Plus</td>
            <td><span class="label label-danger">Delivered</span></td>
            <td>
                10
            </td>
            </tr>
            <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="label label-info">Processing</span></td>
            <td>
                10
            </td>
            </tr>
            <tr>
            <td><a href="pages/examples/invoice.html">OR1848</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="label label-warning">Pending</span></td>
            <td>
                10
            </td>
            </tr>
            <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>iPhone 6 Plus</td>
            <td><span class="label label-danger">Delivered</span></td>
            <td>
                10
            </td>
            </tr>
            <tr>
            <td><a href="pages/examples/invoice.html">OR9842</a></td>
            <td>Call of Duty IV</td>
            <td><span class="label label-success">Shipped</span></td>
            <td>
                10
            </td>
            </tr>
            </tbody>
        </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
    </div>
    <!-- /.box-footer -->
    </div>
</div>

<div class="col-md-4">
    <!-- USERS LIST -->
    <div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Mis mascotas</h3>

        <div class="box-tools pull-right">
        <span class="label label-danger">{{auth()->user()->pet()->count()}}</span>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
        </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
        @if($pets->count() != 0)
        @foreach($pets as $pet)
        <li>
            <img src="{{Storage::url($pet->avatar)}}" alt="Pet Avatar">
            <a class="users-list-name" href="{{ route('pets.show', $pet) }}">{{$pet->name}}</a>
        </li>
        @endforeach
        @else
        <p style="margin-top:10px;margin-bottom:10px;" class="text-center">
            <a href="{{ route('pets.create') }}">Agrega tu primera mascota!</a>
        </p>
        @endif
        </ul>
        <!-- /.users-list -->
    </div>
    <!-- /.box-body -->
    @if($pets->count() > 8)
    <div class="box-footer text-center">
        <a href="{{ route('pets.index') }}" class="uppercase">Ver todas</a>
    </div>
    @endif
    <!-- /.box-footer -->
    </div>
    <!--/.box -->
</div>
</div>
@endsection