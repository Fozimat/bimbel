<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Register</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

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

    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Register</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('register') }}" id="sign_up">
                    @csrf
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line @error('nama') error focused @enderror">
                            <input type="text" class="form-control" name="nama" placeholder="Name" autofocus
                                value="{{ old('nama') }}">
                        </div>
                        @error('nama')
                        <label id="nama-error" class="error" for="nama">{{ $message }}
                            @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line @error('email') error focused @enderror">
                            <input type="email" class="form-control" name="email" placeholder="Email Address"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <label id="email-error" class="error" for="email">{{ $message }}
                            @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line @error('password') error focused @enderror">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        @error('password')
                        <label id="password-error" class="error" for="password">{{ $message }}
                            @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line @error('password_confirmation') error focused @enderror">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password">
                        </div>
                        @error('password_confirmation')
                        <label id="password_confirmation-error" class="error" for="password_confirmation">{{ $message }}
                            @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">group_work</i>
                        </span>
                        <div class="form-line @error('id_tingkat') error focused @enderror">
                            <select class="form-control show-tick" name="id_tingkat">
                                <option value="">-- Pilih Tingkat --</option>
                                @foreach ($tingkat as $t)
                                @if(old('id_tingkat') == $t->id)
                                <option value="{{ $t->id }}" selected>{{ $t->tingkat }}</option>
                                @else
                                <option value="{{ $t->id }}">{{ $t->tingkat }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @error('id_tingkat')
                        <label id="nama-error" class="error" for="id_tingkat">{{ $message }}
                            @enderror
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">REGISTER</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ route('login') }}">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>