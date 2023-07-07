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
                  <h3 class="box-title">Management Comapny</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{isset($company) ? route('companies.update',$company->id) :
                         route('companies.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($company))
                            @method('PUT')
                        @endif
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Company Name</label>
                      <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ isset($company) ?$company->name:''}}" placeholder="Company Name">
                      @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Company Location</label>
                      <input type="text" name="location" class="@error('location') is-invalid @enderror form-control" value="{{ isset($company) ?$company->location:''}}" placeholder="Company Location">
                      @error('location')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Company Description</label>
                      <input type="text" name="description" class="@error('description') is-invalid @enderror form-control" value="{{ isset($company) ?$company->description:''}}" placeholder="Company Description">
                      @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    @isset($user)

<div class="form-group">
    <label>Currently MAnager</label>
    <p class="help-block"><strong>{{$user->role}}</strong></p>
</div>
@endisset

<div class="form-group">
    <label for="selectRole">Select a manager</label>
    <select class="form-control" name="user_id" id="selectRole">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="selectRole">Select a city</label>
    <select class="form-control" name="city_id" id="selectRole">
        @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
</div>

                    <div class="form-group">
                      <label for="selectRole">Company Status</label>
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

                    {{ isset($company) ?"Update Company Info":"Add Company"}}

                    </button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->

</div>
@stop
