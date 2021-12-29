<div class="statistic">
    <div class="container">
        <h2>{{ __('Our great stats') }}</h2>
        <div class="row">


            <div class="statists-box col-lg-6 col-sm-10">

                <div class="statistic-items d-flex flex-wrap wow animate__fadeInUp" data-wow-delay=".7s">

                    <div class="col-6 ">
                        <div class="statistic-item rounded">
                            <i class="far fa-heart fa-2x"></i>
                            <h3 data-scroll='254'>0</h3>
                            <p>{{ __('first box') }}</p>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="statistic-item rounded">
                            <i class="fal fa-globe fa-2x"></i>
                            <h3 data-scroll="425">0</h3>
                            <p>{{ __('secand box') }}</p>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="statistic-item rounded">
                            <i class="far fa-smile fa-2x"></i>
                            <h3 data-scroll="198">0</h3>
                            <p>{{ __('third box') }}</p>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="statistic-item rounded">
                            <i class="fal fa-gift fa-2x"></i>
                            <h3 data-scroll="343">0</h3>
                            <p>{{ __('fourth box') }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6  col-sm-10 image-box wow animate__fadeInUp" data-wow-delay=".7s">
                <img src="{{ asset('uploads/'.$statstic->image) }}" style="width: 100%;" alt="">
            </div>

        </div>
    </div>
</div>