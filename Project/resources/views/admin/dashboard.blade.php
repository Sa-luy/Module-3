@extends('admin.main')
@section('content')
{{-- @php
    dd($user);
@endphp --}}
<h5>Hello {{Auth::user()->name}}</h5>
<div class="row dash-row">
    <div class="col-xl-4">
        <div class="stats stats-primary">
            <h3 class="stats-title">{{__('lang.routename.product')}} </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class='bx bx-category'></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{count($products_home)}}</div>
                    <div class="stats-change">
                        <span class="stats-percentage">+25%</span>
                        <span class="stats-timeframe">from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="stats stats-success ">
            <h3 class="stats-title"> {{__('lang.routename.category')}}  </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-cart-arrow-down"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{count($categories)}}</div>
                    <div class="stats-change">
                        <span class="stats-percentage">+17.5%</span>
                        <span class="stats-timeframe">from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="stats stats-danger">
            <h3 class="stats-title">Total Money</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">5</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
