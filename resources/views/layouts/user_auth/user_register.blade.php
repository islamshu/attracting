<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_general_value('title_ar') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/libs/fontawesome-pro-5.14.0-web/css/all.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('front/css/signUp.css') }}">
</head>
<body>
    





<div class="main">
    <div class="container">
        <div class="content-box">
            <div class="row">
                <div class="col-lg-7">
                    <div class="sign-up">
                        <h3>{{ __('Create User Account') }}</h3>
                       
                        @include('inc.alerts.error')
                        @include('inc.alerts.success')
                        <form method="post" action="{{ route('post_register') }}">
                            @csrf
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control mb-2" placeholder="{{ __('name') }}">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control mb-2" placeholder="{{ __('email') }}">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control mb-2" placeholder="{{ __('phone') }}">

                            <input type="password" name="password" class="form-control mb-2" placeholder="{{ __('password') }}">
                            <input type="password" name="password_confirm" class="form-control mb-2" placeholder="{{ __('password confirm') }}">
                            <input type="submit" class="btn d-block sign-btn clearfix" value="{{ __('sign up') }}">

                        </form>
    
                    
                    </div>
                </div>
    
                <div class="col-lg-5">
                    <div class="sign-in">
                        <h3>{{ __('welcome back.') }}</h3>
                        <a href="{{ route('get_login') }}" class="btn">{{ __('Sign in') }}</a>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


















    <script src="{{ asset('front/libs/jquery-3.1.0.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{ asset('front/libs/fontawesome-pro-5.14.0-web/js/all.min.js') }}" ></script>

</body>
</html>