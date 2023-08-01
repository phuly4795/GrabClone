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
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>

                    {{-- <a href="{{route('profile.edit')}}"></a>  --}}
                @else
                    <a href="{{route('login')}}"><b>Đăng nhập/Đăng ký</b></a>
                @endif
            </div>
        </div>
    </div>
</div>