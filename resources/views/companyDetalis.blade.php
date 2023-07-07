@extends('layouts.site')

@section('content')

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


<div class="Currency-bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="abouttitle">
          <h2>Company</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="Request">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage3">
          <h2>Subscribe Now</h2>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <form method="post" action="{{route('subscribe.store')}}"  enctype="multipart/form-data">
            @csrf
            @auth()
          <input type="text" name="user_id" value="{{Auth::user()->id}}"   class="form-control" hidden>
          @endif
          <input type="text" name="company_id" value= "{{$company->id}}" class="form-control" hidden>
          <label>Input your email pleace:</label><br>
          <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="Email" type="Email">
          @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <label>Input a photo about contarct:</label><br>
          <input type="file" name="photo"  class=" @error('photo') is-invalid @enderror form-control" >
          @error('photo')
                <div class="alert alert-danger">{{$message}}</div>
         @enderror
          <button class="send-btn">Subscribe</button>
         </form>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" >
        <div class="Request-box">
          <figure><img src="{{asset('front/images/Request.jpg')}}" alt="img"/></figure>
          <div class="Register">
          	<h3> {{$company->name}} </h3>
          	<p>location {{$company->location}} <br> Conditions {{$company->profile->conditions}}
               <br> Email {{$company->profile->email}} <br>
               About Our Company {{$company->profile->information}} <br>
               Our Team {{$company->profile->members}}
        </p>
          	<a href="#">Balance Transfe</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
