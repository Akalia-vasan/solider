<!DOCTYPE html>
<html>
<head>
<title>@yield('title',config('app.name')) &mdash; {{config('app.name')}}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Solider">
<meta name="keywords" content="">
<meta name="csrf-token" content="{{csrf_token()}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/css/main1.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/main2.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/util.css')}}">

<link href="https://fonts.googleapis.com/css?family=Carter+One&display=swap" rel="stylesheet">
<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,800,900&display=swap" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
<!--link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/-->
<!-- <script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script> -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .pointer{
        cursor: pointer;
    }
    .overlayBlue {
        height: -webkit-fill-available !important;
    }
    .navbar-nav li.nav-item.active {
        border-bottom: 2px solid {{ request()->is('/') ? 'white' : 'blue' }};
    }
    .google-maps-link {
        text-decoration: none !important;
    }
    .not-active {
        pointer-events: none;
        cursor: default;
        text-decoration: none;
        color: black;
    }
</style>
@yield('css')
</head>
<body>
    <div class="@if(isset($class) && $class == 'main') main @else header1 @endif">
        @include('web.partials.nav')
