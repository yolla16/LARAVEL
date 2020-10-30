<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.5/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('register')}}">
        {{ csrf_field() }}
        <h1 class="h3 mb-3 font-weight-normal">Register {{ config('app.name')}}</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="name" id="inputName"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Please insert your name"
            value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        @endif

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" value="{{ old('email') }}" id="inputEmail"
            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email address" required>
        @if ($errors->has('email'))
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
        @endif

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword"
            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required>
        @if ($errors->has('password'))
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
        @endif

        <label for="inputPassword" class="sr-only">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="inputPassword"
            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
            placeholder="Password Confirmation" required>
        @if ($errors->has('password_confirmation'))
        <div class="invalid-feedback">
            {{$errors->first('password_confirmation')}}
        </div>
        @endif

        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
</body>

</html>