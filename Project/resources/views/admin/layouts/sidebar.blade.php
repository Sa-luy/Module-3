<div class="dash-nav dash-nav-dark">
    <header>
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="{{route('dashboard')}}" class="easion-logo"><i class="fas fa-sun"></i> <span>TMH</span></a>
    </header>
    <nav class="dash-nav-list">
        <a href="{{route('dashboard')}}" class="dash-nav-item">
            <i class="fas fa-home"></i> {{__('lang.routename.dashboard')}}</a>
        <div class="dash-nav-dropdown">
            <a href="{{route('category.index')}}" class="dash-nav-item dash">
                <i class="fas fa-chart-bar"></i> {{__('lang.routename.category')}} </a>
            <div class="dash-nav-dropdown-menu">
                {{-- <a href="chartjs.html" class="dash-nav-dropdown-item">Chart.js</a> --}}
            </div>
        </div>
        <div class="dash-nav-dropdown ">
            <a href="{{route('product.index')}}" class="dash-nav-item dash">
                <i class="fas fa-cube"></i> {{__('lang.routename.product')}} </a>
        </div>
        {{-- <div class="dash-nav-dropdown ">
            <a href="{{route('customer.index')}}" class="dash-nav-item dash">
                <i class="fas fa-cube"></i> {{__('lang.routename.customer')}} </a>
        </div> --}}
        <div class="dash-nav-dropdown">
            <a href="#" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-cube"></i>{{__('lang.routename.customer')}}</a>
            <div class="dash-nav-dropdown-menu">
                <i class="fas fa-file"></i>  <a href="{{route('customer.index')}}" class="dash-nav-dropdown-item">{{__('lang.routename.customer-list')}}</a>
                <i class="fas fa-file"></i> <a href="{{route('export')}}" class="dash-nav-dropdown-item">File Excel</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="{{route('user.index')}}" class="dash-nav-item dash">
                <i class="fa-solid fa-users"></i>{{__('lang.routename.user')}}</a>
        
        </div>
        <div class="dash-nav-dropdown">
            <a href="{{route('role.index')}}" class="dash-nav-item dash">
                <i class="fas fa-info"></i> {{__('lang.routename.role')}} </a>
       
        </div>
        <div class="dash-nav-dropdown">
            <a href="{{route('permissions.create')}}" class="dash-nav-item dash">
                <i class="fas fa-info"></i>Dữ liệu permission</a>
        
        </div>
        <div class="dash-nav-dropdown">
            <a href="{{route('order.index')}}" class="dash-nav-item dash">
                <i class="fas fa-info"></i>Order</a>
        
        </div>
    </nav>
</div>