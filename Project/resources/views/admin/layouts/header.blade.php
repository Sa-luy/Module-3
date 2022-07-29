<style>
    
.header__top__right__language {
	position: relative;
	display: inline-block;
	margin-right: 40px;
	cursor: pointer;
}

.header__top__right__language:hover ul {
	top: 23px;
	opacity: 1;
	visibility: visible;
}

.header__top__right__language:after {
	position: absolute;
	right: -21px;
	top: 1px;
	height: 20px;
	width: 1px;
	background: #000000;
	opacity: 0.1;
	content: "";
}

.header__top__right__language img {
	margin-right: 6px;
}

.header__top__right__language div {
	font-size: 14px;
	color: #1c1c1c;
	display: inline-block;
	margin-right: 4px;
}

.header__top__right__language span {
	font-size: 14px;
	color: #1c1c1c;
	position: relative;
	top: 2px;
}

.header__top__right__language ul {
	background: #222222;
	width: 100px;
	text-align: left;
	padding: 5px 0;
	position: absolute;
	left: 0;
	top: 43px;
	z-index: 9;
	opacity: 0;
	visibility: hidden;
	-webkit-transition: all, 0.3s;
	-moz-transition: all, 0.3s;
	-ms-transition: all, 0.3s;
	-o-transition: all, 0.3s;
	transition: all, 0.3s;
}

.header__top__right__language ul li {
	list-style: none;
}

.header__top__right__language ul li a {
	font-size: 14px;
	color: #ffffff;
	padding: 5px 10px;
}
</style>
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
        <a href="#" target="_blank" class="tools-item">
            <i class="fab fa-github"></i>
        </a>
        <a href="#!" class="tools-item">
            <i class="fas fa-bell"></i>
            <i class="tools-item-count">4</i>
        </a>
        <div class="dash-nav-dropdown ">
            <div class="header__top__right__language">
                <img  src="{{ asset('home/img/language.png') }}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a  class="chane_lang" href="">Viet Nam</a></li>
                    <li><a class="chane_lang" href="">English</a></li>
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
    <script>
      
      $(function() {
            $('#chane_lang').on('click', deleteProduct)
        })

        function deleteProduct(event) {
            event.preventDefault();
            alert(123)
        }
    </script>
    
</header>