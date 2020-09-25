@extends('layouts.app')
@section('title','Register')
@section('_')
</div>

<div class="frontdiv  d-flex mt-5">
    <div class="col-md-5 leftpart px-3 row justify-content-center">
        <div class="overlayBlue"></div>
        <div class="col-md-auto d-flex p-4">
        </div>
        <div class="col-md-auto d-flex p-4">
        </div>
    </div>
    <div class="col-md-7 m-auto pt-4 p-0">
        <form action="{{URL::to('/register')}}" method="post" id="register">
            <div class="d-flex col-md-6 justify-content-center m-auto border-bottom">
                <h4 class="fs-20 logo  text-center">Register</h4>
            </div>
            <div class=" inputdiv form-group col-md-auto m-auto row py-4 ">
                <div class="col-md-6 m-auto py-3">
                    <label for="name" class="Ofw-600 fs-14">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') ErrorMsg @enderror" placeholder="enter the first name" id="first-name" value="{{old('first_name')}}">
                    <p style="font-size: 14px; font-style: italic;">@error('first_name') {{$message}} @enderror</p>
                </div>
                <div class="col-md-6 m-auto py-3">
                    <label for="name" class="Ofw-600 fs-14">Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') ErrorMsg @enderror" placeholder="enter the last name" id="last-name" value="{{old('last_name')}}">
                    <p style="font-size: 14px; font-style: italic;">@error('last_name') {{$message}} @enderror</p>
                </div>
                @csrf
                <div class="col-md-6 m-auto py-3">
                    <label for="Email" class="Ofw-600 fs-14"> Email</label>
                    <input type="text" name="email" class="form-control  @error('email') ErrorMsg @enderror" placeholder="Enter an email" id="Email" value="{{old('email')}}">
                    <p style="font-size: 14px; font-style: italic;">@error('email') {{$message}} @enderror</p>
                </div>
                <div class="col-md-6 m-auto py-3">
                    <label for="Mobno" class="Ofw-600 fs-14"> Mobile</label>
                    <input type="text" name="mobile" class="form-control  @error('mobile') ErrorMsg @enderror" placeholder="Enter the mobile" id="Mobno" value="{{old('mobile')}}">
                    <p style="font-size: 14px; font-style: italic;">@error('mobile') {{$message}} @enderror</p>
                </div>
                <div class="col-md-6 m-auto py-3">
                    <label for="Pass" class="Ofw-600 fs-14">Password</label>
                    <input type="password" name="password" class="form-control  @error('password') ErrorMsg @enderror" placeholder="Enter the password" id="Pass" value="{{old('password')}}">
                    <p style="font-size: 14px; font-style: italic;">
                        @error('password') {{$message}} @enderror
                    </p>
                </div>
                <div class="col-md-6 m-auto py-3">
                    <label for="Conpass" class="Ofw-600 fs-14"> Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') ErrorMsg @enderror" placeholder="Retype the password" id="Conpass" value="{{old('password_confirmation')}}">
                    <p style="font-size: 14px; font-style: italic;">@error('password_confirmation') {{$message}} @enderror</p>
                </div>
                <div class="col-md-6">
                    <p style="font-size: 12px;font-style: italic; color: #1c0e2a;">
                        Password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                    </p>
                </div>
                <div class="col-md-12 m-auto py-3 text-center">

                    <button type="submit" class="btn10 Mybtn Btn2 px-5  ">Register</button>
                    <br>
                    <p>Already a member ? <a class=" FontCol" href="javascript:void(0);" data-toggle="modal" data-target="#loginModal" style="cursor: pointer;text-decoration:none;">Login</a> </p>
                </div>
                <a href="#"></a>
            </div>
        </form>
    </div>

</div>
@endsection


