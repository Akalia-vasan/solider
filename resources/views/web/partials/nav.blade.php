<?php
function username(){
    $name = explode(' ',Auth::user()->first_name);
    $initals = '';
    if(isset($name[0]) && strlen($name[0])){
        $initals = substr($name[0],0,1);
    }
    if(isset($name[1]) && strlen($name[1])){
        $initals .= substr($name[1],0,1);
    }else{
        $initals .= substr($name[0],1,1);
    }
    unset($name);
    return strtoupper($initals);

}
?>

<nav class="navbar navbar-expand-lg navbar-light  py-3 fixed-top">
    <a class="navbar-brand fs-24" href="{{URL::to('/')}}" style="width: 150px;height: 35px;">
        {{-- <div style="background: url('{{asset('logo.svg')}}');height: 38px;width: 123px;background-repeat: no-repeat;background-size: cover;"></div> --}}
        <img src="{{ (isset($class) && $class == 'main') ? asset('logo.svg') : asset('logo_blue.svg')}}" alt="" style="width: initial;margin-top: -16px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item  @if(isset($page) && $page == 'home') active @endif Dotclass">
                <a class="nav-link tablink Pfw-500 fs-13" href="{{URL::to('/')}}" >HOME <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::check())
                <li class="nav-item Dotclass  @if(request()->is('products')) active @endif">
                    <a class="nav-link Pfw-500 fs-13" href="{{route('products.index')}}">PRODUCTS</a>
                </li>
            @endif

            @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link  Pfw-500 fs-13" style="background-color: {{isset($page) && $page == 'home' ? '#0000FF' : ''}};border-radius:50px;"  data-toggle="modal" data-target="#loginModal" href="#">LOGIN <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(request()->is('register')) active @endif">
                    <a class="nav-link Pfw-500 fs-13" href="{{URL::to('/register')}}" style="background-color: {{isset($page) && $page == 'home' ? '#0000FF' : ''}};border-radius:50px;">REGISTER <span class="sr-only">(current)</span></a>
                </li>
                <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form action="/login" id="login" method="POST" style="width: -webkit-fill-available">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header memod m-auto" style="height: 85px;">
                                </div>
                                {{-- <form> --}}
                                <div class="modal-body">
                                    <p class="text-center text-danger _login-info"></p>
                                    <div class="col-md-auto m-auto py-3">
                                        <label for="name" class="Ofw-600"> Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter an email" id="loginEmail" style="background-color: #ced4da;">
                                    </div>
                                    <div class="col-md-auto m-auto py-3">
                                        <label for="password" class="Ofw-600"> Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter the password" id="loginPassword"  style="background-color: #ced4da;">
                                    </div>
                                    <a href="{{URL::to('/password/reset')}}" class="FontCol float-right" style="padding-right:12px;text-decoration: none;">Forgot Password ?</a>
                                </div>
                                <div class="col-md-auto m-auto text-center">
                                    <button  class="btn10 Btn2 px-5 text-center _login">login</button>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn10 Btn2 px-5 text-center" style="background-color: #f4f0ec !important;">
                                        Close
                                    </button>
                                    <br>

                                    <p class="mt-2">Not a member yet? <a href="{{URL::to('/register')}}" class=" FontCol" style="text-decoration: none;">REGISTER</a> </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        @endif
    </div>
    </ul>
    <form class="searchBar1" id="searchBar1" action="">
        @if(Auth::check())
            <div class="ADbtn ADbtn1 hello Mydropdown px-2 align-self-center  ">
                <p class="ADtxt  fs-20 Mydropbtn" style="cursor: pointer;">{{username()}}</p>

                <div class="dropdown Symbol Mydropdown dropbottom DropBtn float-right">

                    <div class=" dropdown-toggle Mydropbtn px-1" data-toggle="dropdown"></div>
                    </button>

                    <div class="dropdown-menu Mydropbox text-center ss1  mb-2 bg-white rounded">
                        <a class="dropdown-item Ofw-400 fs-14 border-bottom" href="javascript:void(0);"  onclick="document.getElementById('_logout').submit()" >Log Out</a>
                    </div>
                </div>
            </div>
        @endif
    </form>
</nav>
<nav class="p-3">
    <form class="searchBar2" id="searchBar2" action="">
        <div class="notesection d-flex">

            @if(Auth::check())
                <div class="ADbtn ADbtn1 Mydropdown px-3 align-self-center ">
                    <p class="ADtxt  fs-20 Mydropbtn" style="cursor: pointer;">{{username()}}</p>
                    <div class="dropdown Mydropdown Symbol dropbottom DropBtn float-right">

                        <div class=" dropdown-toggle  Mydropbtn px-1" data-toggle="dropdown"></div>

                        <div class="dropdown-menu Mydropbox text-center ss1 mb-2 bg-white rounded">
                            <a class="dropdown-item Ofw-400 fs-14 " href="javascript:void(0);" onclick="document.getElementById('_logout').submit()">Log Out</a>
                        </div>
                    </div>
                </div>
        @endif
    </form>
</nav>
<form action="{{URL::to('/logout')}}" id="_logout" method="post">
    @csrf
</form>
