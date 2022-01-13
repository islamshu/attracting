@extends('layouts.frontend')
@section('css')

    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('front/css/filter.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('front/css/filterAR.css') }}">

    @endif
    <style>
        section.range-slider {
            position: relative;
            width: 200px;
            height: 35px;
            text-align: center;
        }

        section.range-slider input {
            pointer-events: none;
            position: absolute;
            overflow: hidden;
            left: 0;
            top: 15px;
            width: 200px;
            outline: none;
            height: 18px;
            margin: 0;
            padding: 0;
        }

        section.range-slider input::-webkit-slider-thumb {
            pointer-events: all;
            position: relative;
            z-index: 1;
            outline: 0;
        }

        section.range-slider input::-moz-range-thumb {
            pointer-events: all;
            position: relative;
            z-index: 10;
            -moz-appearance: none;
            width: 9px;
        }
        .Center {
            position: relative;
            top: 50%;
            left: 30%;
            margin-top: 5%
        
        }

    </style>

@endsection

@section('content')
    <div class="container">
        <div class="main-filter">

            <h2 class="title wow animate__fadeInUp" data-wow-delay=".7s">search for mids </h2>

            <div class="filter rounded wow animate__fadeInUp" data-wow-delay=".7s">
                <div class="row">

                    <form class="form-inline Search my-2 my-lg-0 col-lg-12  col-md-12 col-sm-12" action="" id="search-form">
                        <input class="form-control mr-sm-2" type="search" name="title" value="{{ $request->title }}" placeholder="Search" aria-label="Search">
                        <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>

                        <div class="select-items col-lg-6 col-md-6 col-sm-12">

                            <select class="select form-control m-2"  name="governorate_id" id="governorate_id">
                                <option value="" selected disabled">اختر المحافظة</option>
                                @foreach ($goverments as $item)
                                    <option value="{{ $item->id }}" @if($request->governorate_id == $item->id) selected @endif >{{ $item->name }}</option>
                                @endforeach

                            </select>

                            <select class="select form-control m-2" onchange="filter()" id="state_id" name="state_id">
                                <option value="" selected disabled>اختر الولاية</option>
                                @forelse (\App\City::where('parent_id',$request->governorate_id)->get() as $item)
                                <option value="{{ $item->id }}" @if($request->state_id == $item->id) selected @endif >{{ $item->name }}</option>
    
                                @empty
                                    
                                @endforelse

                            </select>
                        </div>
                        <!-- <a href="" class="btn btn-info clear-btn rounded " >Clear</a> -->


                        <div class="select-items col-lg-6 col-md-6 col-sm-12" >
                            <select class="select form-control m-2" onchange="filter()" name="states">

                                <option value="0"  selected >اختر الحالة الإجتماعية</option>
                                <option value="1" {{ $request->states == 1 ? 'selected': "" }}>عزباء</option>
                                <option value="2" {{ $request->states == 2 ? 'selected': "" }} >متزوجة</option>
                                <option value="3" {{ $request->states == 3 ? 'selected': "" }} >مطلقة</option>
                                <option value="4" {{ $request->states == 4 ? 'selected': "" }} >أرملة</option>
                            </select>

                            <select class="select form-control m-2" onchange="filter()" name="learn">
                                <option value="0" selected >المستوى التعليمي </option>
                                <option value="1" @if($request->learn == 1) selected @endif>غير متعلم</option>
                                <option value="2" @if($request->learn == 2) selected @endif>ابتدائي</option>
                                <option value="3" @if($request->learn == 3) selected @endif>اعدادي</option>
                                <option value="5" @if($request->learn == 5) selected @endif>ثانوي</option>
                                <option value="5" @if($request->learn == 5) selected @endif>جامعي</option>
                                <option value="6" @if($request->learn == 6) selected @endif>مؤهلات عليا</option>
                            </select>

                        </div>
                        <label for=""> Range price :</label>
                        <br>
                        <span class="rangeValues"></span>

                        <section class="range-slider col-lg-6 col-md-6 col-sm-12">
                            <br>
                           
                            <input class="form-control" name="min_price" onchange="filter()" value="{{ $request->min_price ? $request->min_price : 0}}" min="0" max="600" step="1" type="range">
                            <input class="form-control" name="max_price" onchange="filter()" value="{{  $request->max_price ? $request->max_price : 600 }}" min="0" max="600" step="1" type="range">
                        </section>
                        <button type="button" class="btn btn-warning" id="clear_data"> Clear</button>

                    </form>
                </div>
            </div>







            <div class="services-items text-center">
                <div class="container">
                    <h2 class="results text-left wow animate__fadeInUp" data-wow-delay=".7s">results :</h2>
                    <div class="row justify-content-center">

                        @forelse  ($workers as $item)



                            <div class="col-lg-4 col-sm-6  rounded text-center">
                                <div class="service-item wow animate__fadeInUp" data-wow-delay=".7s">
                                    <span class="available">available</span>
                                    <div class="img-box">
                                        @php
                                            $image = json_decode($item->image);
                                        @endphp
                                        <img style="width: 100%;" src="{{ asset('uploads/' . $image[0]) }}">
                                    </div>
                                    <div class="body-box">
                                        <h2>{{ $item->name }}</h2>
                                        <p>{!! Str::limit("$item->dec", 25, ' ...') !!}</p>
                                        <!-- <h5>Lorem ipsum dolor</h5> -->
                                        <ul class="list-unstyled d-flex justify-content-center">
                                            <li><span class="age">{{ __('age') }}</span>
                                                <span>{{ $item->age }}</span></li>
                                            <li><span class="scountry">{{ __('country') }}</span>
                                                <span>{{ $item->nationality }}</span></li>
                                            <li><span
                                                    class="salary">{{ __('salary') }}</span><span>{{ $item->salary }}$</span>
                                            </li>
                                            <li><span
                                                    class="state">{{ __('state') }}</span><span>{{ get_status($item->social_status) }}</span>
                                            </li>
                                        </ul>
                                        <div class="btns-go">
                                            <a href="{{ route('get_single_work', encrypt($item->id)) }}"
                                                class="btn bg-primary">{{ __('details') }}</a>
                                            <a href="#" class="btn bg-success">{{ __('book') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No Woker find</p>
                        @endforelse


                  

                    </div>
                    <div class="Center">
                        {{ $workers->appends(request()->input())->links()}}

                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
    

     function filter() {
                $('#search-form').submit();
            }
        $(document).ready(function() {
            $('#clear_data').click(function() {
       
                window.location.replace("/fillter");
       
            });
            function getVals() {
                // Get slider values
                var parent = this.parentNode;
                var slides = parent.getElementsByTagName("input");
                var slide1 = parseFloat(slides[0].value);
                var slide2 = parseFloat(slides[1].value);
                // Neither slider will clip the other, so make sure we determine which is larger
                if (slide1 > slide2) {
                    var tmp = slide2;
                    slide2 = slide1;
                    slide1 = tmp;
                }

                var displayElement = parent.getElementsByClassName("rangeValues")[0];
                displayElement.innerHTML = slide1 + " - " + slide2;
            }

            window.onload = function() {
                // Initialize Sliders
                var sliderSections = document.getElementsByClassName("range-slider");
                for (var x = 0; x < sliderSections.length; x++) {
                    var sliders = sliderSections[x].getElementsByTagName("input");
                    for (var y = 0; y < sliders.length; y++) {
                        if (sliders[y].type === "range") {
                            sliders[y].oninput = getVals;
                            // Manually trigger event first time to display values
                            sliders[y].oninput();
                        }
                    }
                }
            }

           
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
                        $('#state_id').html(new Option('اختر الولاية', ''));
                        for (i in obj) {

                            $('#state_id').append(new Option(obj[i].name, obj[i].id));
                        }
                    }


                });
            });
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endsection
