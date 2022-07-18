@extends('layouts.dashboard')
@section('dashboard_title')
Dashboard
@endsection
@section('dashboard_breadcum')
<li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Ads</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"></a>Create</li>
@endsection
@section('dashboard_content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('back') !!}/css/forms/theme-checkbox-radio.css">
    <link href="{!! asset('back') !!}/plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
<div class="col-lg-12 col-12 layout-spacing">
    @include('Alerts.alerts')
    <div class="">
        <div class="widget-content widget-content-area border-top-tab">
            @include('components.dashbaord.tabs')
            <div class="tab-content" id="borderTopContent">
              <form action="{!! route('dashboard.ads.create.two.targeting', $ads) !!}" method="post">
                @csrf
                <div class="tab-pane fade show active" id="border-top-profile" role="tabpanel" aria-labelledby="border-top-profile-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Ad preview : </label><br>
                      <img src="{!! asset('uploads') !!}/ads/{{ DB::table('advertisements')->where('id', $ads)->value('ads') }}" alt="" width="500px">
                      <div class="col-md-12 mt-5">
                        <label for="">Estimate Reach : </label>
                        <p id="reach">2,000 People</p>
                        <input type="hidden" name="click_limits" id="click_limits" value="2000">
                        <div class="progress br-30">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" id="bar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">Select Ad Budget :</label>
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-outline-success">
                              <input type="radio" checked class="new-control-input" name="package" id="package1" value="0.019">
                              <span class="new-control-indicator"></span> Hobby 0,019 ETH
                            </label>
                        </div>
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-outline-success">
                              <input type="radio" class="new-control-input" name="package" id="package2" value="0.05">
                              <span class="new-control-indicator"></span> Full Ad Campain 0,05 ETH
                            </label>
                        </div>
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-outline-success">
                              <input type="radio" class="new-control-input" name="package" id="package3" value="0.20">
                              <span class="new-control-indicator"></span> Business 0,20 ETH
                            </label>
                        </div>
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-outline-success">
                              <input type="radio" class="new-control-input" name="package" id="package4" value="1">
                              <span class="new-control-indicator"></span> Professional 1 ETH
                            </label>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">Referral Code :</label>
                        <input type="text" name="ref_code" value="{{ old('ref_code') }}" class="form-control mb-3" placeholder="Your add will be shown on referrer website only ...">
                      </div>

                      <button type="submit" name="button" class="btn btn-primary ml-3">Continue</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
$('#package1').click(function() {
  $('#bar').css({
      'width': '30%'
  });
  $('#reach').text('2,000 People');
  $('#click_limits').val('2000');
});
$('#package2').click(function() {
  $('#bar').css({
      'width': '50%'
  });
  $('#reach').text('5,000 People');
  $('#click_limits').val('5000');
});
$('#package3').click(function() {
  $('#bar').css({
      'width': '80%'
  });
  $('#reach').text('20,000 People');
  $('#click_limits').val('20000');
});
$('#package4').click(function() {
  $('#bar').css({
      'width': '100%'
  });
  $('#reach').text('50,000 People');
  $('#click_limits').val('50000');
});
</script>

@endsection
