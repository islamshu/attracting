<div class="upperBar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <div class="number">
                    <i class="fas fa-phone-alt"></i>
                    {{ get_general_value('phone') }}
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <div class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ get_general_value('address_' . app()->getLocale()) }}

                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <div class="mail">
                    <i class="fas fa-envelope"></i>
                    {{ get_general_value('email') }}
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <div class="contact">
                    <ul class="list-unstyled d-flex justify-content-end">
                        <li class=""><a href=" {{ get_general_value('facebook') }}"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class=""><a href="{{ get_general_value('instagram') }}"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li class=""><a href="{{ get_general_value('phone') }}"><i
                                    class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




<nav class="navbar navbar-expand-lg navbar-light bg-light" id="">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('uploads/' . get_general_value('header_logo')) }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach (\App\Menu::orderBy('sort_id','asc')->get() as $item)


                    <li class="nav-item active">
                        <a class="nav-link" href="{{ $item->url }}">{{ $item->title }} <span
                                class="sr-only">(current)</span></a>
                    </li>
                @endforeach
            </ul>
            {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder=" Search" aria-label="Search">
        <i class="far fa-search"></i>
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
      </form> --}}

            <div class="btns">
                <a href="#" class="btn login">{{ __('login') }}</a>
                <a href="#" class="btn signup">{{ 'sign up' }}</a>
                @php
                    $lang = app()->getLocale();
                @endphp
                

            </div>
            <a style="display: inline-flex" @if ($lang == 'ar') href="{{ route('change-lang', 'en') }}" @else href="{{ route('change-lang', 'ar') }}" @endif> 
              <i class="fa fa-globe fa-2x "aria-hidden="true"></i>{{ $lang == 'ar' ? 'EN' : 'AR' }}
            </a>

        </div>
    </div>
</nav>
