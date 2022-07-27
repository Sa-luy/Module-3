<div class="dash-nav dash-nav-dark">
    <header>
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="{{route('dashboard')}}" class="easion-logo"><i class="fas fa-sun"></i> <span>Easion</span></a>
    </header>
    <nav class="dash-nav-list">
        <a href="index.html" class="dash-nav-item">
            <i class="fas fa-home"></i> Dashboard </a>
        <div class="dash-nav-dropdown">
            <a href="{{route('category.index')}}" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-chart-bar"></i> Category </a>
            <div class="dash-nav-dropdown-menu">
                <a href="chartjs.html" class="dash-nav-dropdown-item">Chart.js</a>
            </div>
        </div>
        <div class="dash-nav-dropdown ">
            <a href="{{route('product.index')}}" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-cube"></i> Product </a>
            <div class="dash-nav-dropdown-menu">
                <a href="cards.html" class="dash-nav-dropdown-item">Cards</a>
                <a href="forms.html" class="dash-nav-dropdown-item">Forms</a>
                <div class="dash-nav-dropdown ">
                    <a href="#" class="dash-nav-dropdown-item dash-nav-dropdown-toggle">Icons</a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="icons.html" class="dash-nav-dropdown-item">Solid Icons</a>
                        <a href="icons.html#regular-icons" class="dash-nav-dropdown-item">Regular Icons</a>
                        <a href="icons.html#brand-icons" class="dash-nav-dropdown-item">Brand Icons</a>
                    </div>
                </div>
                <a href="stats.html" class="dash-nav-dropdown-item">Stats</a>
                <a href="tables.html" class="dash-nav-dropdown-item">Tables</a>
                <a href="typography.html" class="dash-nav-dropdown-item">Typography</a>
                <a href="userinterface.html" class="dash-nav-dropdown-item">User Interface</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="{{route('user.index')}}" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fa-solid fa-users"></i>User</a>
            <div class="dash-nav-dropdown-menu">
                <a href="blank.html" class="dash-nav-dropdown-item">Blank</a>
                <a href="content.html" class="dash-nav-dropdown-item">Content</a>
                <a href="login.html" class="dash-nav-dropdown-item">Log in</a>
                <a href="signup.html" class="dash-nav-dropdown-item">Sign up</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="{{route('role.index')}}" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-info"></i> Role </a>
            <div class="dash-nav-dropdown-menu">
                <a href="https://github.com/subet/easion" target="_blank" class="dash-nav-dropdown-item">GitHub</a>
             
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="{{route('permissions.create')}}" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-info"></i>Dữ liệu permission</a>
            <div class="dash-nav-dropdown-menu">
                <a href="https://github.com/subet/easion" target="_blank" class="dash-nav-dropdown-item">>>></a>
             
            </div>
        </div>
    </nav>
</div>