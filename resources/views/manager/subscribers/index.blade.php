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
                        <th>Email</th>
                        <th>Contract</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribes as $subscribe)

                      <tr>
                        <td>{{$subscribe->user->name}}</td>
                        <td>{{$subscribe->email}}</td>
                        <td>
                        <img src="{{asset('images/subscribers/'.$subscribe->photo)}}"
                                style="width: 200px;height: 100px;"
                                >
                        </td>
                        <td>
                        @if(Auth::user()->testAccept($subscribe->id)==false)
                        <a href="{{route('subscribe.accept',$subscribe->id)}}" class="btn btn-success"> Accept</a>
                        @else
                        <a href="{{route('subscribe.Unaccept',$subscribe->id)}}" class="btn btn-primary"> Un-Accept</a>
                        @endif
                        <form action="{{route('subscribe.delete',$subscribe->id)}}" method="POST" class=" btn-sm">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-danger"></i>Delete</button>
                                </form>

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
