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

@if(session()->has('info'))
<div class="alert callout callout-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('info') }}
</div>
@endif

@if(session()->has('delete'))
<div class="alert callout callout-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('delete') }}
</div>
@endif

<div class="row">
    @include('layouts.notifications')
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Inbox</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-controls">
            <!-- /.btn-group -->
            <a role="button" href="{{ route('notifications.index') }}" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
            <div class="pull-right">
                Total: {{auth()->user()->notifications()->paginate(10)->total()}}
            </div>
            <!-- /.pull-right -->
            </div>
            <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
                <tbody>
                @foreach(auth()->user()->notifications()->paginate(10) as $notification)
                <tr>
                <td class="text-center">@if($notification->unread())<i class="fa fa-fw fa-envelope"></i>@endif</td>
                <td class="mailbox-name">{{ $notification->data['from'] }}</td>
                <td class="mailbox-subject"><a href="{{ route( 'notifications.show', ['message_id'=>$notification->data['id'], 'notification_id'=>$notification->id]) }}">{{ $notification->data['subject'] }}</a></td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">{{ $notification->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            
            <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
            {{auth()->user()->notifications()->paginate(10)->links()}}
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>

@endsection