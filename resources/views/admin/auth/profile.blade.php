@extends('layouts.admin',['page' => 'profile'])
@section('_')
    <div class="card user-profile o-hidden mb-4">
        <div class="header-cover" style="">
        </div>
        <div class="user-info">
            <img class="profile-picture avatar-lg mb-2" src="{{asset('assets/account.png')}}" alt="">
            <p class="m-0 text-24">{{config('app.name')}} Admin</p>
            <p class="text-muted m-0">{{Auth::user()->email}}</p>
        </div>
        <div class="border-top mb-5"></div>
        <div class="card-body">

            <div class="row">

                <div class="col-md-6">
                    <h4>Change Password</h4>
                    <p>You must remember your current password before changing the password.</p>
                    <div class="card mb-5">
                        <div class="card-body">
                            <form action="{{route('profile.edit')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Type your Current password">
                                        @error('current_password')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Type New Password">
                                        @error('password')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" required  class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password"  required class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm your Password">
                                        @error('password_confirmation')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Change Email Id</h4>
                    <p>You must remember your current Email Id password before changing the Email Id.</p>
                    <div class="card mb-5">
                        <div class="card-body">
                            <form action="{{route('profile.update')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Current Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="current_email" placeholder="Type your current email">
                                    </div>
                                    @error('email')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">New Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" placeholder="Type new email">
                                    </div>
                                    @error('email')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
