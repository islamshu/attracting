
<div class="services-items text-center">
    <div class="container">

        <h2 class="h2">{{ __('Book your maid now') }}</h2>

        <div class="row justify-content-center">

            @foreach ($workers as $item)
          
                
            
            <div class="col-lg-4 col-sm-6  rounded text-center">
                <div class="service-item wow animate__fadeInUp" data-wow-delay=".7s">
                    <span class="available">{{ get_status_worker_all($item) }}</span>
                    <div class="img-box">
                        @php
                         $image =    json_decode($item->image);
                        @endphp
                        <img style="width: 100%;" src="{{ asset('uploads/'.$image[0]) }}">
                    </div>
                    <div class="body-box">
                        <h2>{{ $item->name }}</h2>
                        <p>{!! Str::limit("$item->dec", 25, ' ...') !!}</p>
                        <!-- <h5>Lorem ipsum dolor</h5> -->
                        <ul class="list-unstyled d-flex justify-content-center">
                            <li><span class="age">{{ __('age') }}</span> <span>{{ $item->age }}</span></li>
                            <li><span class="scountry">{{ __('country') }}</span> <span>{{ $item->nationality }}</span></li>
                            <li><span class="salary">{{ __('salary') }}</span><span>{{ $item->salary }}$</span></li>
                            <li><span class="state">{{ __('state') }}</span><span>{{ get_status($item->social_status) }}</span></li>
                        </ul>
                        <div class="btns-go">
                            <a href="{{ route('get_single_work',encrypt($item->id)) }}" class="btn bg-primary">{{ __('details') }}</a>
                            <form action="{{ route('booking.user') }}" method="post">
                                <input type="hidden" name="worker_id" value="{{ encrypt($item->id) }}">

                                @csrf
                                <button style="    color: white;
                                width: 130px;
                                margin: 5px;" type="submit" class="btn bg-success"  >{{ __('Book Now') }}</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <a href="{{ route('fillter') }}" class="btn btn-success mt-4">{{ __('Show More') }}</a>
    </div>
</div>