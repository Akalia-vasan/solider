<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',config('app.name'))</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/styles/css/themes/lite-purple.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('asset/styles/vendor/perfect-scrollbar.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('asset/styles/vendor/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/styles/vendor/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/styles/vendor/toastr.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .ck-editor__editable_inline {
        min-height: 500px;
    }
    </style>
    @yield('css')
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large clearfix">
        <div class="main-header">
            <div class="logo text-center bold">
                {{-- <img src="./asset/images/logo.png" alt=""> --}}
                <a href="{{route('admin.dashboard')}}"><h3>{{config('app.name')}}</h3></a>
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="d-flex align-items-center">
                {{-- <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div> --}}
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->


                <!-- Notificaiton End -->

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user colalign-self-end">
                        <img src="{{asset('assets/account.png')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> {{ucwords(Auth::user()->username)}}
                            </div>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('logout').submit()">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <form action="{{route('admin.logout')}}" method="post" id="logout">
            @csrf
        </form>
        @include('admin.partials.sidebar')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2">@yield('title','Dashboard')</h1>
                <ul>
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    @yield('bredcrumb')
                    @yield('breadcrumb')
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
