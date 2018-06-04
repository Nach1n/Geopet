@extends('layouts.base')
@section('title', 'Dashboard')

@section('js')
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script>
    $('#chat-box').slimScroll({
    height: '250px'
  });
</script>

<script>
$(document).ready(function(){
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            document.getElementById("general-modal").click();
            event.preventDefault();
            return false;
        }
    });
});
</script>
@endsection

@section('content')

@if(session()->has('flash'))
    <div class="alert callout callout-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ session('flash') }}</p>
    </div>
@endif
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
        <div class="inner">
            <h3>150</h3>

            <p>Ventas</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h3>{{ $users }}</h3>

            <p>Clientes</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('users.index') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
    <!-- /.row -->
<div class="row">
    <div class="col-md-7">
        <!-- Chat box -->
        <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>
              <h3 class="box-title">Mensaje general</h3>
            </div>
            <div class="box-body chat" id="chat-box">
              @foreach( $generalMessages as $generalMessage)
              <div class="item">
                <img src="{{ Storage::url($generalMessage->sender->avatar) }}" alt="user image" class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $generalMessage->created_at }}</small>
                    {{ $generalMessage->sender->name . ' ' . $generalMessage->sender->lastname }}
                  </a>
                  {{ $generalMessage->body }}
                </p>
              </div>
              @endforeach
            </div>
            <!-- /.chat -->
            <div class="box-footer">
            <form method="post" action="{{ route('messages.store') }}">
                <div class="form-group">
                    <input class="form-control" id="general-message-subject" name="subject" placeholder="Asunto" required>
                </div>
                <div class="input-group">
                    {!! csrf_field() !!}
                    <input class="form-control" id="general-message" name="body" placeholder="Escribe un mensaje para todos los clientes..." required>

                    <div class="input-group-btn">
                        <button type="button" class="btn btn-success" id="general-modal" data-toggle="modal" data-target="#confirm-submit"><i class="fa fa-plus"></i></button>
                    </div>
                    </div>

                    <div class="modal fade" id="confirm-submit">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">¿Estás absolutamente seguro?</h4>
                            </div>
                            <div class="modal-body">
                            <p>Este mensaje se enviará a todos sus clientes. Si está seguro de realizar esta acción, haga clic en el botón Enviar.</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
          </div>
          <!-- /.box (chat box) -->
    </div>

    <div class="col-md-5">
        <!-- USERS LIST -->
        <div class="box box-danger">
        <div class="box-header with-border">
            <i class="fa fa-users"></i>
            <h3 class="box-title">Últimos clientes</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <ul class="users-list clearfix">
   
                @if(!$lastUsers->isEmpty())
                @foreach($lastUsers as $lastUser)
                <li>
                    <img src="{{ Storage::url($lastUser->avatar) }}" alt="User Image">
                    <a class="users-list-name" href="{{ route('users.edit', $lastUser->id) }}">{{ $lastUser->name }}</a>
                    <span class="users-list-date">Today</span>
                </li>
                @endforeach
                @else
                <p class="text-center">No hay clientes</p>
                @endif
                
            </ul>
            <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="{{ route('users.index') }}" class="uppercase">Ver todos</a>
        </div>
        <!-- /.box-footer -->
        </div>
        <!--/.box -->
    </div>
</div>
@stop