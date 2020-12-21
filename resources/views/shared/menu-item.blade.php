@if ($item['submenu'] == [])
    @if($item['usr_req']==4)
        <li class="nav-item">
            <a class="nav-link" href="{{ url($item['pagina']) }}">{{ $item['etiqueta'] }} </a>
        </li>
        
    @elseif($item['usr_req']==2)
       @if(Auth::user())
        @if(Auth::user()->hasRole('canchero'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url($item['pagina']) }}">{{ $item['etiqueta'] }} </a>
            </li>
        @endif
       @endif
    @elseif($item['usr_req']==1)
          @if(Auth::user())
            @if(Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url($item['pagina']) }}">{{ $item['etiqueta'] }} </a>
            </li>
        @endif
       @endif
    @endif
           
            
@else
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item['etiqueta'] }} <span class="caret"> </span> </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <a class="dropdown-item" href="{{ url($submenu['pagina']) }}">{{ $submenu['etiqueta'] }}</a>
                @else
                    @include('shared.menu-item', [ 'item' => $submenu ])
                @endif
            @endforeach
          
        </div>
    </li>
@endif
