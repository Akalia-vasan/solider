
<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/styles/css/themes/lite-purple.min.css')}}">
</head>

<body class="text-left">
    <div class="auth-layout-wrap" style="background-image: url({{asset('/asset/images/photo-wide-4.jpg')}})">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                            </div>
                            <h1 class="mb-3 text-18">Sign In</h1>
                            <form class="needs-validation " novalidate method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" type="email" class="form-control form-control-rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="invalidCheck">
                                            Remember Me?
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>

                            </form>

                        </div>
                    </div>
                    <div class="col-md-6  " style="background-size: cover;background-image: url(./asset/images/photo-long-3.jpg)">
                        <div class="pr-3 auth-right">
                            @if(Session::has('err'))
                            <p class="text-danger">
                                {{Session::get('err')}}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('asset/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('asset/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('asset/js/es5/script.min.js')}}"></script>
</body>

</html>
