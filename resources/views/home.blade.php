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



<div class="Request-bg">
  <div class="container">
    <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="abouttitle">
         <h2>YOUR HOME</h2>
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
            <img src="{{asset('images/users/'.Auth::user()->photo)}}" width="100px">
          <h2>Update Your Profile</h2>
          <br>
          <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
      <form method="post" action="{{route('updateProfile',Auth::user()->id)}}" enctype="multipart/form-data">
                      @csrf
      <div class="form-group">
    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"  placeholder="Enter email">
  </div>

  <div class="form-group">
    <input type="password" class="form-control" name="password" value="{{Auth::user()->password}}" placeholder="Password">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="address"value="{{Auth::user()->address}}"  placeholder="Enter Address">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="country" value="{{Auth::user()->country}}" placeholder="Enter Country">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="city" value="{{Auth::user()->city}}"  placeholder="Enter City">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Phone">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="work" value="{{Auth::user()->work}}" placeholder="Enter Work">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="about" value="{{Auth::user()->about}}"  placeholder="Enter About You">
  </div>
  <div class="form-group">
    <input type="file" class="form-control" name="photo" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<br>

      </div>
      <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12">
        <div class="Request-box">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Account Number</th>
      <th scope="col">Code</th>
      <th scope="col">Balance</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($accounts as $account)
    <tr>
      <th scope="row">{{$account->id}}</th>
      <td> {{$account->code}} </td>
      <td> {{$account->balance}}  </td>
      <td> {{$account->status}} </td>
      <td>
      <a href="{{route('transfer.create',$account->id)}}" class="btn btn-primary"> Transfer</a>



      </td>
    </tr>
    @endforeach

  </tbody>
</table>



        </div>
      </div>
    </div>
  </div>
</div>


@stop
