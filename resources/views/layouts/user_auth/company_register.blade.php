<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <h3>{{ __('Create Company Account') }}</h3>
                       
                        @include('inc.alerts.error')
                        @include('inc.alerts.success')
                        <form method="post" action="{{ route('post_company_register') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control mb-2" placeholder="{{ __('company name') }}">
                            <input type="text" name="owner_name" value="{{ old('owner_name') }}" class="form-control mb-2" placeholder="{{ __('Owner name') }}">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control mb-2" placeholder="{{ __('email') }}">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control mb-2" placeholder="{{ __('phone') }}">
                            {{-- {{ dd(app()->getLocale()) }} --}}
                            <select required name="governorate_id" class="form-control mb-2" id="governorate_id">
                                <option   value="" selected disabled>{{ __('chose governorate') }} </option>
                                @foreach ($governments as $item)
                                <option value="{{ $item->id }}"> @if(app()->getLocale() == 'ar'){{ $item->name }} @else {{ $item->name_en }} @endif </option>
                                @endforeach

                            </select>
                            <select required class=" form-control" id="state_id" name="state_id" >
                                <option value="" selected disabled >{{ __('chose state') }} </option>
                                
                            </select>
                       
                            <input type="text"   onMouseOver="(this.type='file')" name="commercial_register" value="{{ old('commercial_register') }}" class="form-control mb-2" placeholder="{{ __('commercial register') }}">

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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#governorate_id').change(function() {
               let parent = $(this).val();
    
               $.ajax({
                url: '{{ route('get_state') }}',
                type: 'post',
                dataType: 'html',
                data: {
                    "_token": "{{ csrf_token() }}",
                    parent: parent
                },
                success: function(data) {
                    var jsonData = data;
                    var obj = JSON.parse(jsonData);
                    @if(app()->getLocale() == 'ar')
                    $('#state_id').html(new Option('اختر الولاية', ''));
                    @else
                    $('#state_id').html(new Option('chose state', ''));
                    @endif
                    for (i in obj) {
                        @if(app()->getLocale() == 'ar')
                $('#state_id').append(new Option(obj[i].name, obj[i].id));
                @else
                $('#state_id').append(new Option(obj[i].name_en, obj[i].id));
                @endif
                }
                }
    
    
            });
            });
        
        });
    </script>

</body>
</html>