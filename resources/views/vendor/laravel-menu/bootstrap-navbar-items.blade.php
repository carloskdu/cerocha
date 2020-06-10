      @foreach($items as $item)
            <li @lm_attrs($item) @if($item->hasChildren()) class="nav-item has-treeview" @else class="nav-item" @endif @lm_endattrs>
              @if($item->link) <a @lm_attrs($item->link) @if($item->hasChildren()) class="nav-link" role="button"  aria-haspopup="true" aria-expanded="false" @else class="nav-link" @endif @lm_endattrs href="{!! $item->url() !!}">
              <p>
              {!! $item->title !!}
                
                @if($item->hasChildren()) 
                   <i class="right fas fa-angle-left"></i> 
                 @endif
              </p>
                              
              </a>
              @else
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>{!! $item->title !!}</p>
                </a>
              @endif
              @if($item->hasChildren())
                <ul class="nav nav-treeview">
                  @include(config('laravel-menu.views.bootstrap-items'),
          array('items' => $item->children()))
                </ul>
              @endif
            </li>
            @if($item->divider)
              <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
            @endif
          @endforeach
