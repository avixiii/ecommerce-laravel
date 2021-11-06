<?php
    $menu = config('menudashboard');
?>

<div id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info m-b-20">
                    <div class="image">
                        <a href="" class=" waves-effect waves-block"><img src="/admin/images/profile_av.jpg" alt="User"></a>
                    </div>
                    <div class="detail">
                        <h6>Michael</h6>
                        <p class="m-b-0">info@example.com</p>
                        <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-facebook-box"></i></a>
                        <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-linkedin-box"></i></a>
                        <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-instagram"></i></a>
                        <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-twitter-box"></i></a>
                    </div>
                </div>
            </li>
            <li class="header">MAIN</li>
            @foreach($menu as $item)
            <li class="{{ (request()->is($item['route']) ? 'active open' : '')  }}">
                <a href="{{ route($item['route']) }}" class="toggled waves-effect waves-block">
                    <i class="{{ $item['icon'] }}"></i>
                    <span>{{ $item['label'] }}</span>
                </a>
                @if(isset($item['items']))
                @foreach($item['items'] as $subitem)
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="{{ route($subitem['route']) }}" class=" waves-effect waves-block">{{ $subitem['label'] }}</a>
                        </li>
                    </ul>
                @endforeach
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
