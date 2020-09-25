
        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    @foreach (config('sidebar.main') as $item)
                    {{-- {{dd($item)}} --}}
                        <li class="nav-item @if($page == strtolower($item['text'])) active @endif"  @if(count($item['submenu'] ?? [])) data-item="{{strtolower($item['text'])}}" @endif>
                            <a class="nav-item-hold" href="{{ $item['route'] != '#' ?  route($item['route']) : 'javascript:void(0)' }}">
                                <i class="nav-icon {{$item['icon'] ?? 'i-Bar-Chart'}}"></i>
                                <span class="nav-text">{{$item['text']}}</span>
                            </a>
                            <div class="triangle"></div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <!-- Submenu Dashboards  submenu -->
                @foreach (config('sidebar.main') as $submenu)

                    @if( isset($submenu['submenu']) && count($submenu['submenu']))
                        <ul class="childNav" data-parent="{{strtolower($submenu['text'])}}">
                            @foreach ($submenu['submenu'] as $item)
                                <li class="nav-item">
                                    <a href="{{route($item['route'])}}">
                                        <i class="nav-icon {{$item['icon']}}"></i>
                                        <span class="item-name">{{$item['text']}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <!--=============== Left side End ================-->
