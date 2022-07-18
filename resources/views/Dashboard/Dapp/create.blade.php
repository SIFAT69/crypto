@extends('layouts.dashboard')
@section('dashboard_title')
  Dashboard
@endsection
@section('dashboard_breadcum')
  <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Dapps</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"></a>List</li>
@endsection
@section('dashboard_content')
  <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('back') !!}/plugins/select2/select2.min.css">
  <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
      @include('Alerts.alerts')
      <div id="alert">

      </div>
      <form action="{!! route('dashboard.dapp.store') !!}" method="post" id="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="txhash" id="txhash" value="">
      <div class="widget-content widget-content-area br-6">
        <label for="">Name : </label>
        <input type="text" class="form-control mb-3" name="dapp_name" required value="{{ old('dapp_name') }}">
        <div class="custom-file-container" data-upload-id="myFirstImage">
            <label>Select your dApp logo (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
            <label class="custom-file-container__custom-file">
                <input type="file" class="custom-file-container__custom-file__custom-file-input" required accept="image/*" name="dapp_logo">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
        <label for="">Description</label>
        <textarea name="desc" required class="form-control mb-3" rows="8" cols="80"></textarea>
        <label for="">Dapp Link</label>
        <input type="text" class="form-control mb-3" name="dapp_link" value="{{ old('dapp_link') }}" required>

        <label for="">Select Web3</label>
        <select class="basic form-control" name="web3" required>
          @foreach ($categories as $key => $category)
            <option value="{{ $category->category }}">{{ $category->category }}</option>
          @endforeach
        </select>
        <div class="col-md-12 mt-5">
          <label for="">Estimate Reach : </label>
          <p id="reach">2,000 People</p>
          <input type="hidden" name="click_limits" id="click_limits" value="2000">
          <input type="hidden" name="amount" id="inp_amount" value="0.019" aria-describedby="helpId">
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

        <button type="button" class="btn btn-primary" onClick="startProcess()">Pay with ETH</button>

      </div>
      </form>
  </div>
  <script type="text/javascript">
      function startProcess() {
          if ($('#inp_amount').val() > 0) {
              // run metamsk functions here
              EThAppDeploy.loadEtherium();
          } else {
              $("#alert").append(`<div class="alert alert-danger">Please Enter Valid Amount</div>`)
          }
      }


      EThAppDeploy = {
          loadEtherium: async () => {
              if (typeof window.ethereum !== 'undefined') {
                  EThAppDeploy.web3Provider = ethereum;
                  EThAppDeploy.requestAccount(ethereum);
              } else {
                  $("#alert").append(`<div class="alert alert-danger">Not able to locate an Ethereum connection, please install a Metamask wallet</div>`)
              }
          },
          /****
           * Request A Account
           * **/
          requestAccount: async (ethereum) => {
              ethereum
                  .request({
                      method: 'eth_requestAccounts'
                  })
                  .then((resp) => {
                      //do payments with activated account
                      EThAppDeploy.payNow(ethereum, resp[0]);
                  })
                  .catch((err) => {
                      // Some unexpected error.
                      $("#alert").append(`<div class="alert alert-danger">` + err.message + `</div>`)
                  });
          },
          /***
           *
           * Do Payment
           * */
          payNow: async (ethereum, from) => {
              var amount = $('#inp_amount').val();
              ethereum
                  .request({
                      method: 'eth_sendTransaction',
                      params: [{
                          from: from,
                          to: "0x558572A544f6d6030b9a23C98d689D48D2EF4d9a",
                          value: '0x' + ((amount * 1000000000000000000).toString(16)),
                      }, ],
                  })
                  .then((txHash) => {
                      if (txHash) {
                          $("#alert").append(`<div class="alert alert-success"> Your payment success (Click here to verify 👉) <a href="https://ropsten.etherscan.io/tx/` + txHash + `" target="_blank">` + txHash + `</a></div>`)
                          $('#txhash').val(txHash)
                          $("#form").submit()
                      } else {
                          $("#alert").append(`<div class="alert alert-danger">Something went wrong. Please try again</div>`)
                      }
                  })
                  .catch((error) => {
                      $("#alert").append(`<div class="alert alert-danger">` + error.message + `</div>`)
                  });
          },
      }
  </script>

  <script type="text/javascript">
  var firstUpload = new FileUploadWithPreview('myFirstImage')
  var ss = $(".basic").select2({
      tags: true,
  });
  </script>
  <script type="text/javascript">
  $('#package1').click(function() {
    $('#bar').css({
        'width': '30%'
    });
    $('#reach').text('2,000 People');
    $('#click_limits').val('2000');
    $('#inp_amount').val('0.019');
  });
  $('#package2').click(function() {
    $('#bar').css({
        'width': '50%'
    });
    $('#reach').text('5,000 People');
    $('#click_limits').val('5000');
    $('#inp_amount').val('0.05');
  });
  $('#package3').click(function() {
    $('#bar').css({
        'width': '80%'
    });
    $('#reach').text('20,000 People');
    $('#click_limits').val('20000');
    $('#inp_amount').val('0.20');
  });
  $('#package4').click(function() {
    $('#bar').css({
        'width': '100%'
    });
    $('#reach').text('50,000 People');
    $('#click_limits').val('50000');
    $('#inp_amount').val('1');
  });
  </script>
  <script src="{!! asset('back') !!}/plugins/select2/custom-select2.js"></script>
  <script src="{!! asset('back') !!}/plugins/select2/select2.min.js"></script>
@endsection
