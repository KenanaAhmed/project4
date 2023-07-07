@extends('back.back')
@section('content2')
<div class="row">
            <div class="col-md-6" style="margin-left:200px;">
              <div class="box box-default">
                <div class="box-header with-border">
                  <i class="fa fa-warning"></i>
                  <h3 class="box-title">Statistical</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Count OF User!</h4>
                    {{$countUser}}
                  </div>
                  <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Count OF Manager!</h4>
                    {{$countManager}}
                  </div>
                  <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> companies !</h4>
                   {{$companies}}
                  </div>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Cities !</h4>
                    {{$cities}}
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
</div>
@endsection
