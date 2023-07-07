
@extends('manager.back')

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

<form method="post" action="{{route('subscribe.accepted',$subscribe->id)}}">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Code</label>
    <input type="text" name="code" class="@error('code') is-invalid @enderror form-control" id="exampleInputEmail1"
    value="{{isset($account)?$account->code:''}}"
    aria-describedby="emailHelp" placeholder="Enter Code">
    @error('code')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Balance</label>
    <input type="number" name="balance" class="@error('balance') is-invalid @enderror form-control"
    value="{{isset($account)?$account->balance:''}}"
    id="exampleInputPassword1">
    @error('balance')
         <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@stop
