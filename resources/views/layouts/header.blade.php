<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIAKAD'S NEPI</title>
        <link type="text/css" href="{{url('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{url('admin/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{url('admin/css/theme.css')}}" rel="stylesheet">
        <link type="text/css" href="{{url('admin/images/icons/css/font-awesome.css')}}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Selamat Datang </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li><a href="#">{{Auth::user()->name}}</a></li>
                            <li><a href="#">Di Sistem Informasi Akademik Negara Api</a></li>
                        </ul>
                      
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{url('admin/images/user.png')}}" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <form id="logout-form" action="{{ url('logout') }}"
                                    method="POST" style="display: none;">@csrf </form>
                                <li><a href="#" tyle="cursor: pointer;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="menu-icon icon-signout"></i>Logout </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        @if(Auth::user()->role=='admin')
                        @include('layouts.sidebaradmin')
                        @else
                        @include('layouts.sidebarmahasiswa')
                        @endif
                    </div>
                    @yield('content')
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
@include('layouts.footer')
