@extends('manager.back')
@section('content2')

<div class="card text-white bg-primary mb-3" style="max-width: 50%;margin-left:200px;margin-top:50px;padding:20px;">
  <div class="card-header">
    <h3>Company Name : {{$company->name}}</h3>
    <i><h3>Company Manager : {{Auth::user()->name}}</h3></i>
  </div>
  <div class="card-body">
    <h4 class="card-title">About Your Company</h4>
    <p class="card-text">
       location : {{$company->location}} <br>
       contract text : {{$company->description}} <br>
       status : {{$company->status}} <br>
    </p>
  </div>

  <div class="card-body">
    <h4 class="card-title">About Your Company Information</h4>
    <p class="card-text">
       Information : {{$profile->information}} <br>
       Condition text : {{$profile->conditions}} <br>
       Members : {{$profile->members}}<br>
       Email : {{$profile->email}} <br>
    </p>
    <form method="post" action="{{route('companiesInfo.update',$profile->id)}}" enctype="multipart/form-data">
    @csrf
                        @if (isset($profile))
                            @method('PUT')
                        @endif


          <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Information</label>
                     <textarea name="information" class="@error('information') is-invalid @enderror form-control">

                     {{$profile->information}}
                     </textarea>
                      @error('information')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Conditions</label>
                     <textarea name="conditions" class="@error('conditions') is-invalid @enderror form-control">

                     {{$profile->information}}
                     </textarea>
                      @error('information')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Members</label>
                     <textarea name="members" class="@error('members') is-invalid @enderror form-control">

                     {{$profile->members}}
                     </textarea>
                      @error('members')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Company Email</label>
                      <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" value="{{ isset($profile) ?$profile->email:''}}" placeholder="Company Email">
                      @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="photo"id="exampleInputFile">
                    </div>
                    @if(isset($profile))
                            <div class="form-group">
                                <img src="{{asset('images/companies-profile/'.$profile->photo)}}" alt=" " style="width:100%">
                            </div>
                        @endif

                  </div><!-- /.box-body -->

                    <button type="submit" class="btn btn-primary">

                    {{ isset($profile) ?"Update Information":""}}

                    </button>
                </form>
  </div>
<div>

</div>


</div>
@stop
