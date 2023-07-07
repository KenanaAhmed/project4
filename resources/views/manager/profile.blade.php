
@extends('manager.back')
@section('content2')

<div class="row">
            <!-- left column -->
            <div class="col-md-8" style="margin-left:150px ;" >
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Your Profile</h3>
                </div>
                <form method="post" action="{{route('updateProfile',Auth::user()->id)}}" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control @error('name') is-invalid @enderror">
                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="text" name="phone" value="{{Auth::user()->phone}}"  class="form-control @error('phone') is-invalid @enderror">
                          @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Work</label>
                          <input type="text" name="work" value="{{Auth::user()->work}}" class="form-control @error('work') is-invalid @enderror">
                          @error('work')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control @error('address') is-invalid @enderror">
                          @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" value="{{Auth::user()->city}}" class="form-control @error('city') is-invalid @enderror">
                          @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text"  name="country" value="{{Auth::user()->country}}" class="form-control @error('country') is-invalid @enderror">
                          @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                      </div>

                      <input type="text" name="role"value="{{Auth::user()->role}}" hidden>
                      <input type="text" name="status"value="{{Auth::user()->status}}" hidden>


                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> </label>
                            <textarea name="about" type="text" class="form-control @error('about') is-invalid @enderror" rows="5"></textarea>
                            @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Photo</label>
                          <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                          @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
              </div><!-- /.box -->
      </div>
</div>
@stop
