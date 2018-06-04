<div class="col-md-3">
    <!-- <a href="#" class="btn btn-primary btn-block margin-bottom">Nueva notificación</a> -->

    <div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Carpetas</h3>

        <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
        <li><a href="{{ route('notifications.index') }}"><i class="fa fa-inbox"></i> Inbox
            @if($count = Auth::user()->unreadNotifications->count())
            <span class="label label-warning pull-right">{{ $count }}</span>
            @endif
        </a></li>
        </ul>
    </div>
    <!-- /.box-body -->
    </div>
</div>