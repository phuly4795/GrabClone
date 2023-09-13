<nav class="navbar navbar-expand-lg bg-body-tertiary Headernavbar">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
</nav>

@section('cssClient')
    <style>
        .Headernavbar{
            background-color: #14425D !important;
        }
    </style>
@endsection


{{-- 
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
@endif --}}