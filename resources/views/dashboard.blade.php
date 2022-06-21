@extends('layouts.dashboard')
@section('dashboard_title')
Dashboard
@endsection
@section('dashboard_breadcum')
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Dashboard</a></li>
@endsection
@section('dashboard_content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-one">
        <div class="widget-content">
            <div class="tabs tab-content" style="text-align: center">
                <h2>WELCOME TO DASHBOARD</h2>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-one">
        <div class="widget-heading">
            <div class="task-action">
                <div class="dropdown">
                </div>
            </div>
        </div>

        <div class="widget-content">
            <div id="revenueMonthly"></div>
        </div>
    </div>
</div>


@endsection
