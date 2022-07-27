<header class="dash-toolbar">
    <a href="#!" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>
    <a href="#!" class="searchbox-toggle">
        <i class="fas fa-search"></i>
    </a>
    <form class="searchbox" action="#!">
        <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
        <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
        <input type="text" class="searchbox-input" placeholder="type to search">
    </form>
    <div class="tools">
        <a href="https://github.com/subet/easion" target="_blank" class="tools-item">
            <i class="fab fa-github"></i>
        </a>
        <a href="#!" class="tools-item">
            <i class="fas fa-bell"></i>
            <i class="tools-item-count">4</i>
        </a>
        <div class="dash-nav-dropdown ">
            <a href="#" class="dash-nav-dropdown-item dash-nav-dropdown-toggle">Eng lish</a>
            <div class="dash-nav-dropdown-menu">
                <a href="icons.html" class="dash-nav-dropdown-item">Vi</a>
                <a href="icons.html#regular-icons" class="dash-nav-dropdown-item">China</a>
                <a href="icons.html#brand-icons" class="dash-nav-dropdown-item">Korea</a>
            </div>
            <div class="header__top__right__language">
                <img src="{{ asset('home/img/language.png') }}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> 
        </div>
        <div class="dropdown tools-item">
            <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="#!">Profile</a>
                <a class="dropdown-item" href="login.html"><form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form></a>
            </div>
        </div>
    </div>
</header>