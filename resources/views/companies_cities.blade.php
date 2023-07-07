@extends('layouts.site')

@section('content')


<div class="Currency">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage">
          <h2>OUR <strong class="cur">Companies</strong></h2>
          <span><img src="{{asset('front/images/boder.png')}}" alt="img"/> </span> </div>
      </div>
    </div>
    <div class="row">
        @foreach($companies as $company)
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
        <div class="three-box">
          <figure><img src="{{asset('front/images/1.jpg')}}" alt="img"/></figure>
          <div class="Bitcoin"> <i><img src="{{asset('front/images/dollar.png')}}" alt="img"/></i>
            <h3> {{$company->name}} </h3>
            <h4> {{$company->about}} </h4>

            </p>
          </div>
          <a class="read-more" href="{{route('companyDetalis.show',$company->id)}}">Visit Us</a> </div>
      </div>


      @endforeach

    </div>
  </div>
</div>
<!-- end Currency -->
<!--state abouts -->
<div class="abouts"> <dir class="abouts-bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="abouts-us">
          <h3>About Us <strong class="cur">our company</strong></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ani</p>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="abouts-us">
          <figure><img src="{{asset('front/images/about.png')}}" alt="img"/></figure>
        </div>
      </div>
    </div>
  </div>
  </dir> </div>




<div class="Request">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage3">
          <h2>Request A call</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <form method="post" action="{{route('comments.store')}}">
            @csrf
          <input class="form-control" name="name" placeholder="Name" type="Name">
          <input class="form-control" name="phone" placeholder="Phone" type="Phone">
          <input class="form-control" name="email" placeholder="Email" type="Email">
          <textarea class="textarea" name="message" placeholder="Message" >Message</textarea>
          <button type="submit" class="send-btn">Send</button>
        </form>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="Request-box">
          <figure><img src="{{asset('front/images/Request.jpg')}}" alt="img"/></figure>
          <div class="Register">
            <h3>Get started today widh digital money bitcon</h3>
            <p>consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Ut enim </p>
            <a href="#">Register now</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
