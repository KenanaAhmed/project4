@extends('manager.back')

@section('content2')

@if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Balance</th>
                        <th>Email</th>
                        <th>Contract</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($accounts as $account)

                      <tr>
                        <td>{{$account->user->name}}</td>
                        <td>{{$account->code}}</td>
                        <td>{{$account->balance}}</td>
                        <td>{{$account->user->email}}</td>
                        <td>
                        <img src="{{asset('images/subscribers/'.$account->photo)}}"
                                style="width: 200px;height: 100px;"
                                >
                        </td>
                        <td>
                        @if(Auth::user()->account($account->id)==false)
                        <a href="{{route('accounts.active',$account->id)}}" class="btn btn-success"> Active</a>
                        @else
                        <a href="{{route('accounts.decline',$account->id)}}" class="btn btn-primary"> Decline</a>
                        @endif
                        </td>

                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
</div>


@stop
