@extends('layouts.back')

@section('content')
  <body class="skin-blue">
    <div class="wrapper">

@include('back.include.header')
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->

        @include('back.include.sidebar')
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include('back.include.content-header')

        <!-- Main content -->
        <section class="content">

        @yield('content2')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      @include('back.include.footer')
    </div><!-- ./wrapper -->

@stop
