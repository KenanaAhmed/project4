@extends('layouts.site')

@section('content')


<section class="slider_section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <!-- state banner -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active"> <img class="first-slide" src="{{asset('front/images/banner.jpg')}}" alt="First slide"> </div>
            <div class="carousel-item"> <img class="second-slide" src="{{asset('front/images/banner.jpg')}}" alt="Second slide"> </div>
            <div class="carousel-item"> <img class="third-slide" src="{{asset('front/images/banner.jpg')}}" alt="Third slide"> </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <i class='fa fa-angle-right'></i></a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <i class='fa fa-angle-left'></i></a> </div>
        <!-- end banner -->
      </div>
      <div class="col-md-6">
        <div class="full-slider_cont">
          <h1>World ‘s popular<br>
            <span class="dark_brown">Bitcoin company</span></h1>
          <p>It is a long established fact that a reader will be distracted by the <br>
            readable content of a page when looking at its layout. The point <br>
            of using Lorem Ipsum is that it has a more-or-less normal dis<br>
            tribution of letters, as opposed to using 'Content here, content<br>
            here', making it look like readable English. Many desktop<br>
            publishing packages and more-or-less normal distribution of <br>
            letters, as opposed to using 'Content here, content here', making<br>
            it look like readable English. Many desktop publishing packages and </p>
          <div class="button_section"> <a class="main_bt" href="#">Exchange</a> <a class="main_bt" href="#">About Us</a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Currency -->
<div class="Currency">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage">
          <h2>OUR <strong class="cur">Centers</strong></h2>
          <span><img src="{{asset('front/images/boder.png')}}" alt="img"/> </span> </div>
      </div>
    </div>
    <div class="row">
        @foreach($cities as $city)
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
        <div class="three-box">
          <figure><img src="{{asset('front/images/1.jpg')}}" alt="img"/></figure>
          <div class="Bitcoin"> <i><img src="{{asset('front/images/dollar.png')}}" alt="img"/></i>
            <h3> {{$city->name}} </h3>

            </p>
          </div>
          <a class="read-more" href="{{route('companies.cities',$city->id)}}">Visit Us</a> </div>
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



<!-- state abouts -->
<div class="our experts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="titlepage2">
          <h2>our <strong class="cur">Clients</strong></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
        </div>
      </div>
    </div>
  </div>
  <div class="experts-box">
    <div class="container">
      <div class="row">

        @foreach($managers as $manager)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12" style="margin-bottom:10px;">
          <div class="experts-threebox">
            @isset($manager->photo)
            <figure><img src="{{asset('images/users/'.$manager->photo)}}" alt="img"/></figure>
            @else
            <figure><img src="{{asset('front/images/profile.png')}}"></figure>
            @endif
            <h3> {{$manager->name}} </h3>
            <span> {{$manager->email}} </span>
            <p>
                 Company {{$manager->company->name}} <br>
                 About {{$manager->about}}
            </p>
            <div class="icon"> <i> <a href="#"><img src="{{asset('front/images/facebook.png')}}"></a></i> <i> <a href="#"><img src="{{asset('front/images/Twitter.png')}}"></a></i> <i> <a href="#"><img src="{{asset('front/images/linkedin.png')}}"></a></i> <i> <a href="#"><img src="{{asset('front/images/instagram.png')}}"></a></i> </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
<!-- end abouts -->
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
