<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('user_dash/libs/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
    @yield('css')
    <title>{{ get_general_value('title_ar') }}</title>
</head>
<body>
    

    


    <div class="main">
        <div class="row">
            <div class="col-3  list-tog" id="navigation">
                <div class="list">

                    <div class="brand-logo">
                        <div class="img-box">
                            <img src="{{ asset('uploads/'.get_general_value('header_logo')) }}">
                        </div>
                    </div>

                    <div class="user-info">
                        <div class="img">
                            <img src="{{ asset('front/user_image.png') }}" alt="">
                        </div>
                        <div class="info-text">
                            <h3>{{ auth()->user()->name }}</h3>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="list-dropdown">
                        <ul class="list-unstyled">

                        

                            <li>
                                <a href="{{ route('user.dashboard') }}" class="{{ (request()->routeIs('user.dashboard')) ? 'active' : '' }}">
                                    <i class="far fa-users fa-2x"></i>
                            <span>{{ __('maids') }}</span>
                            <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user.orders') }}" class="{{ (request()->routeIs('user.orders')) ? 'active' : '' }}">
                                    <i class="far fa-credit-card-front fa-2x"></i>
                                <span>{{ __('Orders') }}</span>
                                <i class="fas fa-chevron-right"></i>
                                </a>
                                </li>

                            {{-- <li>
                                <a href="{{ route('user.message') }}" class="{{ (request()->routeIs('user.message')) ? 'active' : '' }}">
                                    <i class="far fa-money-check-edit-alt fa-2x"></i>
                            <span>Invoices</span>
                            <i class="fas fa-chevron-right"></i>
                                    </a>
                            </li> --}}


                            <li>
                                <a href="{{ route('user.message') }}" class="{{ (request()->routeIs('user.message')) ? 'active' : '' }}">
                                    <i class="far fa-comment fa-2x"></i>
                                <span>{{ __('contact') }}</span>
                                <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>

                        
                        
                        </ul>
                    </div>

                </div>
            </div>
            <div class="content col-9 col-md-9 " id="panel">

                <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
            
                    <div class="col-2 col-md-2 col-sm-1">
                        <div id="toggle" class="toggle"></div>
                        <h3 class="title">Dashboard</h3>
                    </div>
            
                    <div class="col-4 col-md-4 col-sm-6 d-flex justify-content-center">
                    {{-- <form class="form-inline">
                        <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
                        <i class="far fa-search search"></i>
                    </form> --}}
                    </div>
            
                    <div class="col-4 col-md-4 last">
                        
                    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNavAltMarkup">
                        <div class="navbar-nav align-items-center">
                          
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><img src="{{ asset('front/user_image.png') }}"></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                   
                                    <a class="dropdown-item" href="/edit_user/profile"><i class="fas fa-user"></i> {{ __('profile') }} </a>

                                    <a class="dropdown-item" href="{{ route('logout_user') }}"><i class="fas fa-sign-out-alt"></i> {{ __('Sign Out') }} </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
            
                </nav>

            @yield('content')
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{ asset('user_dash/libs/fontawesome-pro-5.14.0-web/js/all.min.js') }}"></script>
    <script src="{{ asset('user_dash/js/script.js') }}"> </script>
</body>
</html>