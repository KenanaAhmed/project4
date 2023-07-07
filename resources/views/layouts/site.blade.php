
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Digitco</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- bootstrap css -->
<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
<!-- style css -->
<link rel="stylesheet" href="{{asset('front/css/style.css')}}">

<!-- style Me css -->
<link rel="stylesheet" href="{{asset('front/css/styleMe.css')}}">
<!-- Responsive-->
<link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
<!-- fevicon -->
<link rel="icon" href="{{asset('front/images/fevicon.png')}}" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="{{asset('front/css/jquery.mCustomScrollbar.min.css')}}">
<!-- Tweaks for older IEs-->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">
<!-- loader  -->
<div class="loader_bg">
  <div class="loader"><img src="{{asset('front/images/loading.gif')}}" alt="#" /></div>
</div>
<!-- end loader -->
<!-- header -->
<header>
  <!-- header inner -->
  <div class="head-top">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
          <div class="email"> <a href="#">Email : demo@gmail.com</a> </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
          <div class="icon"> <i> <a href="#"><img src="{{asset('front/icon/facebook.png')}}"></a></i> <i> <a href="#"><img src="icon/Twitter.png"></a></i> <i> <a href="#"><img src="icon/linkedin.png"></a></i> <i> <a href="#"><img src="icon/google+.png"></a></i> </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
          <div class="contact"> <a href="#">Contact :  +71  78908540</a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
        <div class="full">
          <div class="center-desk">
            <div class="logo"> <a href="index.html"><img src="{{asset('front/images/logo.jpg')}}" alt="#"></a> </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
        <div class="menu-area">
          <div class="limit-box">
            <nav class="main-menu">
              <ul class="menu-area-main">
                <li class="active"> <a href="{{route('site.welcome')}}">Home</a> </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                                <li>
                                    <a class="nav-link" href="{{ route('regester.manager') }}">{{ __('Register AS Manager') }}</a>
                                </li>

                        @else
                            <li>
                                <a  href="{{route('home')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest

            </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header inner -->
</header>
<!-- end header -->



@yield('content')

<!-- footer -->
<footer>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="Contact">
            <h3>Contact Us</h3>
            <ul class="contant_icon">
              <li> <a href="#"><img src="{{asset('front/icon/location.png')}}"></a></li>
              <li> <a href="#"><img src="{{asset('front/icon/tellephone.png')}}"></a></li>
              <li> <a href="#"><img src="{{asset('front/icon/email.png')}}"></a></li>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
          <div class="Social">
            <h3>Social links</h3>
            <ul class="socil_link">
              <li><a href="#"><img src="{{asset('front/icon/fb.png')}}"></a></li>
              <li><a href="#"><img src="{{asset('front/icon/Tw.png')}}"></a></li>
              <li> <a href="#"><img src="{{asset('front/icon/lin.png')}}"></a></li>
              <li> <a href="#"><img src="{{asset('front/icon/insta.png')}}"></a></li>
            </ul>
          </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
          <div class="newsletter">
            <h3>newsletter</h3>
            <input class="new" placeholder="Enter your email" type="Enter your email" >
            <button class="subscribe">subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <p>Copyright 2019 All Right Reserved By <a href="http://html.design">Free html Templates</a></p>
    </div>
  </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('front/js/plugin.js')}}"></script>

<!-- sidebar -->
<script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
</body>
</html>
