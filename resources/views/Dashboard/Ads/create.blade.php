@extends('layouts.dashboard')
@section('dashboard_title')
Dashboard
@endsection
@section('dashboard_breadcum')
<li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Ads</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"></a>Create</li>
@endsection
@section('dashboard_content')
    <link rel="stylesheet" type="text/css" href="{!! asset('back') !!}/css/forms/theme-checkbox-radio.css">
    <link href="{!! asset('back') !!}/plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
<div class="col-lg-12 col-12 layout-spacing">
  @include('Alerts.alerts')
    <div class="">
        <div class="widget-content widget-content-area border-top-tab">
            @include('components.dashbaord.tabs')
            <div class="tab-content" id="borderTopContent">
              <form action="{!! route('dashboard.ads.create.one.details') !!}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-pane fade show active" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
                    <h4 class="mb-4">Create Ad</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">URL :</label>
                            <input type="link" name="url" class="form-control mb-3" value="{{ old('url') }}" placeholder="https://website.com/">
                        </div>
                        <div class="col-md-12">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control mb-3" value="{{ old('title') }}" placeholder="Bitcoin #50">
                        </div>
                        <div class="col-md-12">
                          <label for="">Price :</label>
                          <input type="text" name="price" class="form-control mb-3" value="{{ old('price') }}" placeholder="0.05">
                        </div>
                        <div class="col-md-12 layout-spacing">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label>Ad Image (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="ads">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 ml-4" name="button">Continue</button>
                    </div>

                </div>
              </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
  var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>

@endsection
