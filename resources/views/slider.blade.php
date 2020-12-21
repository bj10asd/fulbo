
<div id="carousel-example" class="carousel slide" data-ride="carousel">


    <ol class="carousel-indicators">
        @foreach($slides as $item)
            <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? ' active' : '' }}"></li>
        @endforeach
    </ol>
    
   <div class="carousel-inner" role="listbox">
       @foreach($slides as $item)
           <div class="item {{ $loop->first ? ' active' : '' }}">
           <a href="{{ url($item->pag_url) }}">
                <img src="{{ url($item->url) }}" alt="{{ $item->title }}" style="margin: auto;" height="800" width="600">
            </a>
            <div class="carousel-caption">
                <h1><a href="{{ url($item->pag_url) }}"> {{ $item->title }}</a></h1>
                <h3>{{ $item->description}}</h3>
            </div>
       </div>
       @endforeach
    </div>
    
   <!-- Carousel Controls -->
   <a class="left carousel-control" href="#carousel-example" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
    
   <!-- End Carousel Controls -->
</div>
