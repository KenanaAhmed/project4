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
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Company Name</th>
                        <th>Company Location</th>
                        <th>Company Description</th>
                        <th>Company Status</th>
                        <th>Company Contract</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)

                      <tr>
                        <td>{{$company->name}}</td>
                        <td>{{$company->location}}</td>
                        <td>{{$company->description}}</td>
                        <td>{{$company->status}}</td>

                        <td>
                        <img src="{{asset('images/companies/'.$company->photo)}}"
                                style="width: 200px;height: 100px;"
                                >
                        </td>
                        <td>
                        <a href="{{route('companies.edit',$company->id)}}" class="btn btn-primary">
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
