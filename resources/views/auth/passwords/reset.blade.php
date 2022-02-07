<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Reset Password</title>
    <!-- Favicon-->
    {{--
    <link rel="icon" href="../../favicon.ico" type="image/x-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Reset Password</b></a>
        </div>
        @if (session('status'))
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username
                        and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" placeholder="Email"
                                class="form-control @error('email') focused error @enderror" name="email" required
                                autocomplete="email" value="{{ $email ?? old('email') }}" autofocus>
                        </div>
                        @error('email')
                        <span class="font-bold text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password" placeholder="Password"
                                class="form-control @error('password')focused error @enderror" name="password" required
                                autocomplete="new-password">
                        </div>
                        @error('password')
                        <span class="font-bold text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password-confirm" type="password" class="form-control"
                                placeholder="Confirm Password" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>
                        @error('password')
                        <span class="font-bold text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>