@extends('back.back')

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
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Comapnay Name</th>
                        <th>Company Location</th>
                        <th>Contract</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)

                      <tr>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->company_name}}</td>
                        <td>{{$user->company_location}}</td>
                        <td>
                        <img src="{{asset('images/managers/'.$user->photo)}}"
                                style="width: 200px;height: 100px;"
                                >
                        </td>
                        <td>
                        <a href="{{route('managers.edit',$user->id)}}" class="btn btn-primary">
                                    Accept</a>

                                <form action="{{route('managers.delete',$user->id)}}" method="POST" class="float-right btn-sm ml-2">
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
