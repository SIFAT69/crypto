@extends('layouts.dashboard')
@section('dashboard_title')
  Dashboard
@endsection
@section('dashboard_breadcum')
  <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Dapp</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"></a>Ads</li>
@endsection
@section('dashboard_content')
  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
      @include('Alerts.alerts')


      <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <h4>Total Clicks on Ads : {{ $ads_click }} times</h4>
            <form action="{!! route('dashboard.ads.update') !!}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                  <label for="">Ads</label>
                  <p>Current Image : </p>
                  <br>
                  <img src="{!! asset('uploads') !!}/ads/{{ $ads->ads }}" alt="">
                  <br>
                  <br>
                  <input type="file" class="form-control-file mb-3" name="ads">
                  <label for="">Ads</label>
                  <input type="text" class="form-control mb-3" name="link" value="{{ $ads->link }}">
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
          </div>
      </div>
  </div>
@endsection
