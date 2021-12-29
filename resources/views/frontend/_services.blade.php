<div class="services text-center" id="services">
    <div class="container">

        <h5>{{ __('what we do') }}</h5>
        <h2>{{ __('our services') }}</h2>

        <div class="row">
            @foreach ($services as $item)
                
         
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12  rounded wow animate__fadeInUp" data-wow-delay=".7s">
                <div class="item">
                    <div class="icon-box">
                        <i class="{{ $item->icon }} services_icon fa-2x"></i>
                    </div>
                    <h3>{{ $item->title }}</h3>
                    <p>{!! $item->dec !!}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>