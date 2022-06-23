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

<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 layout-spacing">
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
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
         <div class="widget widget-one_hybrid widget-followers" style="height: 435px">
             <div class="widget-heading">
                 <div class="w-title">
                     <div class="w-icon">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                     </div>
                     <div class="">
                         <p class="w-value">{{ DB::table('adsclicks')->count('clicks') }} Clicks</p>
                         <h5 class="">Total Ads Click</h5>
                     </div>
                 </div>
             </div>
             <div class="widget-content">
                 <div class="w-chart">
                     <div id="hybrid_followers"></div>
                 </div>
             </div>
         </div>
     </div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
  <div class="widget-content widget-content-area br-6">
      <div class="table-responsive mb-4 mt-4">
          <table id="zero-config" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>Banner</th>
                      <th>Link</th>
                      <th>Status</th>
                      <th>Total Clicks</th>
                      <th>Created at</th>
                  </tr>
              </thead>
              @php
                // $ads = DB::table('adsclicks')->get();
                $ads = DB::table('advertisements')->get();
              @endphp
              <tbody>
                @foreach ($ads as $ad)
                  {{-- @php
                   $ads_details = DB::table('advertisements')->where('id', $ad->ads_id)->first();
                  @endphp --}}
                  <tr>
                    <td>
                      <img src="{!! asset('uploads') !!}/ads/{{ $ad->ads }}" width="80px" alt="">
                    </td>
                    <td>
                      {{ $ad->link }}
                    </td>

                    <td>
                      <small class="badge badge-success">Active</small>
                    </td>
                    <td>
                      {{ DB::table('adsclicks')->where('ads_id', $ad->id)->sum('clicks') }} Clicks
                    </td>
                    <td>
                       {{ \Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}
                     </td>

                  </tr>


                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                    <th>Banner</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Total Clicks</th>
                    <th>Created at</th>
                  </tr>
              </tfoot>
          </table>
      </div>
  </div>
     </div>



@endsection
