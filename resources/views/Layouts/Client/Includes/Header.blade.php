<div class="Headernavbar">
    <div class="Headermain">
        <div class="Headerlogo">
            <img src="https://food.grab.com/static/images/logo-grabfood2.svg" alt="Logo">
        </div>
        <div class="HeaderCartGroup">
            <div class="HeaderCart HeaderBorder">
                <a href="{{route('cartIndex')}}"> <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <div class="HeaderLogin HeaderBorder">
                @if(Auth::check())
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>Xin chào: {{auth()->user()->name}}</b>
                        </button>
                        <ul class="dropdown-menu">
                            <x-dropdown-link :href="route('profile.edit')"> {{ __('Hồ sơ cá nhân') }} </x-dropdown-link>
                            @if(auth()->user()->role_id  == 1)
                            <x-dropdown-link :href="route('dashboard')">{{ __('Trang quản trị') }} </x-dropdown-link>
                            @endif
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf          
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Đăng xuất') }}
                                </x-dropdown-link>
                        
                            </form>
                        </li>
                        </ul>
                  </div>
                @else
                    <a href="{{route('login')}}"><b>Đăng nhập/Đăng ký</b></a>
                @endif
            </div>
        </div>
    </div>
</div>