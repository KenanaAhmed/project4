@extends('manager.back')
@section('content2')


        <!-- Main content -->
        <section class="content">
          <!-- MAILBOX BEGIN -->
          <div class="mailbox row">
            <div class="col-xs-12">
              <div class="box box-solid">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3 col-sm-4">
                      <!-- BOXES are complex enough to move the .box-header around.
                                This is an example of having the box header within the box body -->
                      <div class="box-header">
                        <i class="fa fa-inbox"></i>
                        <h3 class="box-title">INBOX</h3>
                      </div>
                      <!-- compose message btn -->
                      <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Compose Message</a>
                      <!-- Navigation - folders-->
                      <div style="margin-top: 15px;">
                        <ul class="nav nav-pills nav-stacked">
                          <li class="header"></li>
                          <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox : {{$transfers->count()}}</a></li>
                        </ul>
                      </div>
                    </div><!-- /.col (LEFT) -->
                    <div class="col-md-9 col-sm-8">
                      <div class="row pad">
                        <div class="col-sm-6">

                          <!-- Action button -->
                          <div class="btn-group">


                          </div>

                        </div>
                        <div class="col-sm-6 search-form">

                        </div>
                      </div><!-- /.row -->

                      <div class="table-responsive">
                        <!-- THE MESSAGES -->
                        <table class="table table-mailbox">
                            @foreach($transfers as $transfer)
                          <tr class="unread">
                            <td class="small-col"><input type="checkbox" /></td>
                            <td class="small-col"><i class="fa fa-star"></i></td>
                            <td class="name"><a href="#">From : {{$transfer->sender($transfer->account_id)}}</a></td>
                            <td class="name"><a href="#">To : {{$transfer->reciver($transfer->receiver_number)}}</a></td>
                            <td class="subject"><a href="#"> {{$transfer->amount}} </a></td>
                            <td class="time"> {{$transfer->created_at}} </td>
                            <td class="time">
                                @if($transfer->status=="unAccept")
                                   <a href="{{route('transfer.accept',$transfer->id)}}" class="btn btn-primary"> Accept</a>
                                   @else
                                   <a href="#" class="btn btn-success"> DONE</a>
                                @endif


                        </td>

                          </tr>
                          @endforeach

                        </table>
                      </div><!-- /.table-responsive -->
                    </div><!-- /.col (RIGHT) -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">

                </div><!-- box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col (MAIN) -->
          </div>
          <!-- MAILBOX END -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
          </div>
          <form action="#" method="post">
            <div class="modal-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">TO:</span>
                  <input name="email_to" type="email" class="form-control" placeholder="Email TO">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">CC:</span>
                  <input name="email_to" type="email" class="form-control" placeholder="Email CC">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">BCC:</span>
                  <input name="email_to" type="email" class="form-control" placeholder="Email BCC">
                </div>
              </div>
              <div class="form-group">
                <textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-success btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment"/>
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>

            </div>
            <div class="modal-footer clearfix">

              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>

              <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Message</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@stop
