@extends('back.back')

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
<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>City ID</th>
                        <th>City Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)

                      <tr>
                        <td>{{$city->id}}</td>
                        <td>{{$city->name}}</td>
                        <td>
                        <img src="{{asset('images/cities/'.$city->photo)}}"
                                style="width: 200px;height: 100px;"
                                >
                        </td>
                        <td>
                        <a href="{{route('cities.edit',$city->id)}}" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-search"></i>Edit</a>
                        </td>

                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
</div>


@stop
