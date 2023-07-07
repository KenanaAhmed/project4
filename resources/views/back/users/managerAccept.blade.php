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
                  <h3 class="box-title">Management Manager</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('managers.create',$manager->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">User Name</label>
                      <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ $manager->name}}" placeholder="User Name">
                      @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">User Email</label>
                      <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" value="{{ $manager->email}}" placeholder="User Email">
                      @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">User Password</label>
                      <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" value="{{ $manager->password}}" placeholder="City Name">
                      @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Company Name</label>
                      <input type="text" name="company_name" class="@error('company_name') is-invalid @enderror form-control" value="{{ $manager->company_name}}" placeholder="City Name">
                      @error('company_name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Company Location</label>
                      <input type="text" name="company_location" class="@error('company_location') is-invalid @enderror form-control" value="{{ $manager->company_location}}" placeholder="City Name">
                      @error('company_location')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Company Description</label>
                      <input type="text" name="company_description" class="@error('company_description') is-invalid @enderror form-control" value="{{ $manager->company_description}}" placeholder="City Name">
                      @error('company_description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="selectRole">Select Company City</label>
                      <select class="form-control" name="city_id" id="selectRole">
                        @foreach( $cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach

                      </select>

                    </div>

                  <div class="form-group">
                            <label for="selectRole">Select a role</label>
                            <select class="form-control" name="role" id="selectRole">
                                <option value="manager">Manager</option>
                            </select>
                    </div>

                    <div class="form-group">
                      <label for="selectRole">User Status</label>
                      <select class="form-control" name="status" id="selectRole">
                        <option value="1">Active</option>
                        <option value="0">Decline</option>
                      </select>

                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">

                   Add Manager

                    </button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->

</div>
@stop
