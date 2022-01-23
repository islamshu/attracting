<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_general_value('title_ar') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/libs/fontawesome-pro-5.14.0-web/css/all.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('front/css/signIn.css') }}">
</head>
<body>
    





<div class="main">
    <div class="container">
        <div class="content-box">
            <div class="row">
                <div class="col-lg-7">
                    <div class="sign-in">
                        <h3>{{ __('Sign in to Account') }}</h3>
                      
                        @include('inc.alerts.error')
                        @include('inc.alerts.success')
                        <form method="post" action="{{ route('post_login') }}">
                            @csrf
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control mb-2" placeholder="{{ __('email') }}">
                            <input type="password" name="password" class="form-control mb-2" placeholder="{{ __('password') }}">
                            <input type="submit" class="btn d-block sign-btn clearfix" value="{{ __('login') }}">

                        </form>
                        <a href="{{ route('get_rest') }}" class="forget">{{ __('forget password') }}</a>
    
                        <div class="info d-flex justify-content-center ">
                            <a href="{{ route('fron.page','privacy_policy') }}" >{{ __('Privacy Policy') }}</a>
                            <a href="{{ route('fron.page','terms_of_use') }}">{{ __('Terms') }}</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-5">
                    <div class="sign-up">
                        <h3>{{ __('hello friends.') }}</h3>
                        <a href="{{ route('get_register') }}" class="btn">{{ __('Sign Up') }}</a>
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