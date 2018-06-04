@extends('layouts.base')
@section('title', 'Notificaciones')
@section('content')
<div class="row">
    @include('layouts.notifications')
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$message->subject}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-read-info">
            <h5>De: {{ $message->sender->name . ' ' . $message->sender->lastname }} - &#60;{{$message->sender->email}}&#62;
                <span class="mailbox-read-time pull-right">{{ $message->created_at }}</span></h5>
            </div>
            <div class="mailbox-read-message">
                {{ $message->body }}
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <div class="box-footer">
            <form method="POST" action="{{ route('notifications.destroy', $notification->id ) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default pull-right"><i class="fa fa-trash-o"></i> Borrar</button>
            </form>
        </div>
        <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>
@endsection