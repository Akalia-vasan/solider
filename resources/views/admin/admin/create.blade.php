@extends('layouts.admin',['page' => 'admins'])
@section('title','Create Admin')
@section('css')
    <style>
        .hr_{
            border: 0;
            border-top: 1px solid rgba(0,0,0,.1);
            height: 0;
            margin-top: 0rem;
            margin-bottom: 0rem;
        }
    </style>
@endsection
@section('_')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class=" flex-column">
                        <form action="{{route('admin.store')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$admin->id ?? null}}">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Name <span class="required-symbol">*</span></label>
                                    <input type="text" class="form-control" name="name" id="firstName1" placeholder="Enter your name" value="{{$admin->name ?? old('name')}}">
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="lastName1">Email <span class="required-symbol">*</span></label>
                                    <input type="email" class="form-control" name="email" id="lastName1" placeholder="Enter your email" value="{{$admin->email ?? old('email')}}">
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="password">Password<span class="required-symbol">*</span></label>
                                    <input class="form-control" name="password" type="password" id="password" placeholder="Enter password">
                                    <small id="emailHelp" class="form-text text-muted">Password minimum length should be 6</small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pd-x-20 ladda-button" data-style="expand-right">{{ isset($admin) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
