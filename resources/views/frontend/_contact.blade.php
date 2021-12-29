<div class="howitWorks" id="contact">
    <div class="container">
        <h2>{{ __('how its work') }}</h2>
        <div class="row">
            <div class="timeline">
                @foreach ($how_works as $key=>$item)
                    
                
                <div class="step-{{$key % 2 == 1 ? 'right' : 'left' }} wow animate__fadeInUp" data-wow-delay=".7s">
                    <h3 class="text-right">{{ __('step') }} {{ $key+1 }}</h3>
                    <div class="stepcontent">
                        <div class=" d-flex justify-content-between rounded">
                            <div class="text">
                                <h4>{{ $item->title }}</h4>
                                <p>{!! $item->dec !!}</p>
                            </div>
                            <div class="icon">
                                <i class="fa-4x {{ $item->icon }} timeline_icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                @endforeach


            </div>
        </div>
    </div>

    <!-- <img src="imgs/back/service-shape.png" class="back-img"> -->

</div>