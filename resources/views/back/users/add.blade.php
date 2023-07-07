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

            <!-- left column -->
            <div class="col-md-6" style="margin-left:250px ;margin-top:50px;">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Management User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{isset($user) ? route('users.update',$user->id) :
                         route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">User Name</label>
                      <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ isset($user) ?$user->name:''}}" placeholder="User Name">
                      @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">User Email</label>
                      <input type="email" name="email" class="@error('name') is-invalid @enderror form-control" value="{{ isset($user) ?$user->email:''}}" placeholder="User Email">
                      @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">User Password</label>
                      <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" value="{{ isset($user) ?$user->password:''}}" placeholder="City Name">
                      @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    @isset($user)

<div class="form-group">
    <label>Currently Role</label>
    <p class="help-block"><strong>{{$user->role}}</strong></p>
</div>
@endisset

@isset($user)

<div class="form-group">
    <label>Currently Status</label>
    <p class="help-block"><strong>{{$user->status}}</strong></p>
</div>
@endisset

<div class="form-group">
                            <label for="selectRole">Select a role</label>
                            <select class="form-control" name="role" id="selectRole">
                                <option value="manager">Manager</option>
                                <option value="user">User</option>
                            </select>
             </div>

                    <div class="form-group">
                      <label for="selectRole">User Status</label>
                      <select class="form-control" name="status" id="selectRole">
                        <option value="1">Active</option>
                        <option value="0">Decline</option>
                      </select>

                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="photo"id="exampleInputFile">
                    </div>
                    @if(isset($user))
                            <div class="form-group">
                                <img src="{{asset('images/users/'.$user->photo)}}" alt=" " style="width:100%">
                            </div>
                        @endif

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">

                    {{ isset($user) ?"Update User Info":"Add User"}}

                    </button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->

</div>
@stop
