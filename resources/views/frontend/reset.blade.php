
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_general_value('title_ar') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/libs/fontawesome-pro-5.14.0-web/css/all.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('front/css/reset.css') }}">
</head>
<body>
    <div class="main">

        <div class="container">
            <div class="reset rounded">
                <h2>{{ __('reset password') }}</h2>
                @include('inc.alerts.error')
                @include('inc.alerts.success')
                <form method="post" action="{{ url('/reset_password_without_token') }}">
                    @csrf
                    <input type="email" name="email" class="form-control mb-2" placeholder="Enter Your Email">
                    {{-- <input type="password" class="form-control mb-2" placeholder="New Password">
                    <input type="password" class="form-control mb-2" placeholder="Confirm Password"> --}}
                    <button class="btn btn-success" type="submit">{{ __('Confirm') }}</button>
                </form>
            </div>
        </div>
        
    </div>

<script src="{{ asset('front/libs/jquery-3.1.0.js') }}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="{{ asset('front/libs/fontawesome-pro-5.14.0-web/js/all.min.js') }}" ></script>

</body>
</html>