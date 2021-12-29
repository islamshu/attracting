<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach ($sliders as $key=> $item)
      <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}" class="@if($key ==0) active @endif"></li>
      @endforeach

     
    </ol>
    @foreach ($sliders as $key=> $item)
        
    
    <div class="carousel-inner">
      <div class="carousel-item @if($key ==0) active @endif ">
        <img src="{{ asset('uploads/'.$item->image) }}" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-block justify-content-lg-start align-items-center">
          <h3>{!! $item->main_title !!}</h3>
          <p>{!! $item->title !!}</p>
          @if($item->text_button != null && $item->url != null)
          <a href="{{ $item->url }}" target="_blank" class="btn start-now">{{ $item->text_button }}</a>
          @endif
        </div>
        <div class="overlay">
      </div>
    </div>
    @endforeach
  </div>
  </div>