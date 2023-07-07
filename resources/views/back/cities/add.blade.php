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
                  <h3 class="box-title">Management City</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{isset($city) ? route('cities.update',$city->id) :
                         route('cities.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($city))
                            @method('PUT')
                        @endif
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">City Name</label>
                      <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ isset($city) ?$city->name:''}}" placeholder="City Name">
                      @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="photo"id="exampleInputFile">
                    </div>
                    @if(isset($city))
                            <div class="form-group">
                                <img src="{{asset('images/cities/'.$city->photo)}}" alt=" " style="width:100%">
                            </div>
                        @endif

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">

                    {{ isset($city) ?"Update City":"Add City"}}

                    </button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->

</div>
@stop
