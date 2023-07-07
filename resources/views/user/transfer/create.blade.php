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


<div class="card text-white bg-dark mb-3" style="max-width: 50%; margin-left:300px;
margin-top:20px">
  <div class="card-header">Transfer Card</div>
  <div class="card-body">
    <h5 class="card-title">Some Conditions</h5>
    <p class="card-text">
        1- You must enter the correct amount of the balance <br>
        2- You must enter the correct account number for the other party <br>
        3- The other party must be in the same company <br>
        4- Please enter your ID <br>
        5- Please enter your code secrete and account number
    </p>
  </div>
  <form method="post" action="{{route('transfer.store',$account->id)}}" enctype="multipart/form-data">
    @csrf
          <div class="box-body">


                    <div class="form-group">
                      <label for="exampleInputPassword1">Your Code</label>
                      <input type="text" name="code" class="@error('code') is-invalid @enderror form-control" placeholder="Enter Your secrete code">
                      @error('code')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <input type="text" name="account_id" value="{{$account->id}}" hidden>                    <div class="form-group">
                      <label for="exampleInputPassword1">Amount</label>
                      <input type="number" name="amount" class="@error('amount') is-invalid @enderror form-control" placeholder="Enter Your secrete code">
                      @error('amount')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Account Number Receiver</label>
                      <input type="text" name="receiver_number" class="@error('receiver_number') is-invalid @enderror form-control" placeholder="Enter Account Number Receiver">
                      @error('receiver_number')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="photo"id="exampleInputFile">
                    </div>
                  </div><!-- /.box-body -->

                    <button type="submit" class="btn btn-primary">

                    Transfer

                    </button>
                </form>
</div>




@stop
