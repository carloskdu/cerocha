    
                         
                    @foreach($items as $item)

                              @if($item->hasChildren())
                                <ul class="nav nav-treeview menu-open">
                                    <li @lm_attrs($item) @if($item->hasChildren()) class="nav-item has-treeview menu-open" @else class="nav-item" @endif @lm_endattrs>
                                    @if($item->link) 
                                    <a @lm_attrs($item->link) @if($item->hasChildren()) class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @else class="nav-link" @endif @lm_endattrs href="{!! $item->url() !!}">
                                      <p>{!! $item->title !!}                              
                                      </p>
                                      @if($item->hasChildren()) <b class="caret"></b> @endif
                                    </a>
                                    @else
                                      <p class="navbar-text">{!! $item->title !!}
                                          <i class="right fas fa-angle-left"></i>
                                      </p>
                                    @endif
                                        <li class="nav-item">
                                          <a href="#" class="nav-link active">
                                          <i class="fas fa-address-card nav-icon"></i>
                                        @include(config('laravel-menu.views.bootstrap-items'), array('items' => $item->children()))
                                            </a>
                                        </li>
                                    </li>

                              @else
                                    <li @lm_attrs($item) @if($item->hasChildren()) class="nav-item has-treeview menu-open" @else class="nav-item" @endif @lm_endattrs>
                                    
                                    @if($item->link) 
                                    <a @lm_attrs($item->link) @if($item->hasChildren()) class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @else class="nav-link" @endif @lm_endattrs href="{!! $item->url() !!}">
                                      <p>{!! $item->title !!}                              
                                      </p>
                                      @if($item->hasChildren()) <b class="caret"></b> @endif
                                    </a>
                                    @else
                                      <p class="navbar-text">{!! $item->title !!}
                                          <i class="right fas fa-angle-left"></i>
                                      </p>
                                    @endif
                                  </li>
                              @endif
                       

                    @endforeach
         
   
