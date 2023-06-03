<header class="header-area">
      <div class="header__wrapper">
        <div class="header__board">
          <p class="header__board-txt">Pano: {{$usersPano->title}}</p>
        </div>
        <a href="" class="header__logo">
          <img src="{{asset("assets/front/images/logo.png")}}" alt="logo" class="header__logo" />
        </a>
        <div class="wrapper">
          <div class="search__box">
            <input type="text" class="search__txt" placeholder="Search..." />
            <a href="#" class="search__btn"></a>
          </div>
          <div class="user__icon">
            <div class="ui floating dropdown">
              <img src="{{asset("assets/front/images/user.png")}}" alt="user" class="user__icon-foto" />
              <i class="dropdown icon"></i>
              <div class="menu">
                  @if(\Illuminate\Support\Facades\Auth::user())
                      <div class="item" onclick="window.location='{{url("profile")}}'">Profile</div>
                      <div class="item" onclick="window.location='{{url("logout")}}'">Exit</div>
                  @else
                      <div class="item" onclick="window.location='{{url("register")}}'">Register</div>
                      <div class="item" onclick="window.location='{{url("login")}}'">Login</div>
                  @endif


              </div>
            </div>
          </div>
        <div class="user__icon-mobile">
          <img src="{{asset("assets/front/images/user.png")}}" alt="user" class="user__icon-foto" />
        </div>
      </div>
      <div class="wrapper-mobile">
        <div class="search__box">
          <input type="text" class="search__txt" placeholder="Search..." />
          <a href="#" class="search__btn"></a>
        </div>
      </div>
    </header>
