<div class="footer">
    <div class="container">
  
        <div class="newsletter rounded wow animate__fadeInUp" data-wow-delay=".7s">
  
            <div class="container">
                <div class="row">
                    <div class="item col-lg-6">
                        <i class="far fa-envelope fa-2x"></i>
                        <h2 class="d-inline-block">{{ __('newsletter') }}</h2>
                        <p> {{ __('letter description') }}</p>

                        <p style="visibility: hidden"> Architecto Quis Ratione Optio Unde Possimus Aliquam Reprehenderit Veritatis Ullam Dolorem Adipisci Placea</p>
                    </div>
  
                    <div class="item col-lg-6 align-items-center d-flex" data-wow-delay=".7s">
                        <form action="">
                            <input type="email"  id="emailletter" class="form-control" placeholder="{{ __('Subscribe Now') }}">
                            <button id="send_letter" style="background-color: var(--main-color);
                            color: white;
                            width: 25%;" type="button" class="btn">{{ __('send') }}</button>
                        </form>
                    </div>
  
                </div>
            </div>
        </div>
  
        <div class="row">
  
            <div class="cloumn col-lg-6 col-md-12 wow animate__fadeInUp" data-wow-delay=".7s">
                <ul class="list-unstyled">
                    <li class="logo"><a href="/"><img src="{{ asset('uploads/'.get_general_value('footer_logo')) }}"></a></li>
                    <li class="mb-2"><i class="fas fa-quote-right"></i> {!!get_general_value('dese_'.app()->getLocale()) !!}</li>
                    <li class="mb-2"><i class="fas fa-map-marker-alt"></i> {!!get_general_value('address_'.app()->getLocale()) !!} </li>
                    <li class="mb-2"><i class="fas fa-phone-alt"></i> {{ get_general_value('phone') }}</li>
                </ul>
            </div>
  
            <div class="cloumn col-lg-3 col-md-6 links-list wow animate__fadeInUp" data-wow-delay=".7s">
                <ul class="list-unstyled">
                    <li class="links">{{ __('quick links') }}</li>
                    @foreach (\App\Page::get() as $item)
                    @if(app()->getLocale() == 'ar')
                    <li class="mb-2"><i class="fas fa-caret-left" style="margin-left: 5px;color:#04aa6d"></i><a href="{{ route('fron.page',$item->slug) }}">{{ $item->title }} </a></li>
                    @else
                    <li class="mb-2"><i class="fas fa-caret-right"  style="margin-right: 5px;color:#04aa6d"></i><a href="{{ route('fron.page',$item->slug) }}">{{ $item->title }} </a></li>
                    @endif
                    @endforeach
                 
                </ul>
            </div>
  
  
            <div class="cloumn col-lg-3 col-md-6 wow animate__fadeInUp" data-wow-delay=".7s">
                <ul class="list-unstyled">
                    <li class="more">{{ __('more') }}</li>
                    <li class="mb-2">{{ __('more description') }}</li>
                    <li>
                        <form>
                            <a href="{{ get_general_value('phone') }}" class="btn">{{ __('Call Us') }}</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
  
  
        <div class="footer-bottom row wow animate__fadeInUp" data-wow-delay=".7s">
  
            <p class="col-lg-6 col-sm-12">@ {{ __('copy right') }}</p>
  
  
            <ul
                class="col-lg-6 col-sm-12 social list-unstyled d-flex justify-content-lg-end justify-content-sm-center ">
                <li class=""><a href="{{ get_general_value('facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                <li class=""><a href="{{ get_general_value('instagram') }}"><i class="fab fa-instagram"></i></a></li>
                <li class=""><a href="{{ get_general_value('phone') }}"><i class="fab fa-whatsapp"></i></a></li>
            </ul>
  
  
        </div>
  
    </div>
  </div>
  <div class="wrapper-cover">
    
    <div class="wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <span>...جاري التحميل</span>
    </div>

</div>