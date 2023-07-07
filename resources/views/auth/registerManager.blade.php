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
        <form method="post" action="{{route('manager.store')}}"  enctype="multipart/form-data">
            @csrf

          <label>Input your name pleace:</label><br>
          <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Name">
          @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
        @enderror

          <label>Input your email pleace:</label><br>
          <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="Email">
          @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <label>Input your password pleace:</label><br>
          <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" placeholder="Email">
          @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
        @enderror


        <label>Input a photo about contarct:</label><br>
          <input type="file" name="photo"  class=" @error('photo') is-invalid @enderror form-control" >
          @error('photo')
                <div class="alert alert-danger">{{$message}}</div>
         @enderror

         <label>Input Company Name:</label><br>
          <input type="text" name="company_name"  class=" @error('company_name') is-invalid @enderror form-control" >
          @error('company_name')
                <div class="alert alert-danger">{{$message}}</div>
         @enderror

         <label>Input Company Description:</label><br>
          <input type="text" name="company_description"  class=" @error('company_description') is-invalid @enderror form-control" >
          @error('company_description')
                <div class="alert alert-danger">{{$message}}</div>
         @enderror

         <label>Input Company Location:</label><br>
          <input type="text" name="company_location"  class=" @error('company_location') is-invalid @enderror form-control" >
          @error('company_location')
                <div class="alert alert-danger">{{$message}}</div>
         @enderror
          <button class="send-btn">Subscribe</button>
         </form>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" >
        <div class="Request-box">
          <figure><img src="{{asset('front/images/Request.jpg')}}" alt="img"/></figure>
          <div class="Register">
          	<h3>  </h3>
          	<p> <br> Welcome Boss You Can Add Your Company To Our Web Site
               <br> Welcome ^_^  <br>
            </p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
