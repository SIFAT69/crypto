@extends('layouts.app')
@section('content')
  <section class="section-one">
      <div class="container">
          <div class="row">
              <div class="review-details">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item m-3" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Promoted </button>
                      </li>
                      <li class="nav-item m-3" role="presentation">
                          <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">History</button>
                      </li>
                      <!-- <li class="nav-item m-3 see"><a href="#">See all</a></li> -->

                  </ul>
                  <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="box d-flex banner-slider2">
                            @foreach ($favorites as $key => $value)
                              <div class="item">
                                <a href="{!! route('history.index', $value->id) !!}">
                                  <div class="img"><img src="{!! asset('uploads') !!}/logo/{{ $value->dapp_logo }}" target="_blank" alt=""></div>
                                </a>
                                  <div class="text">
                                      <p>{{ $value->dapp_name }}</p>
                                  </div>
                                </div>
                            @endforeach
                          </div>

                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="box d-flex">
                            @foreach ($history as $key => $value)
                              @php
                                $dapp = DB::table('dapps')->where('id', $value->dapp_id)->first();
                              @endphp
                              <div class="item">
                                <a href="{{ $dapp->dapp_link }}">
                                <div class="img"><img src="{!! asset('uploads') !!}/logo/{{ $dapp->dapp_logo }}" alt=""></div>
                                </a>
                                <div class="text">
                                  <p>{{ $dapp->dapp_name }}</p>
                                </div>
                              </div>
                            @endforeach
                          </div>
                      </div>

                  </div>

              </div>
          </div>
      </div>

  </section>
  @foreach ($category as $key => $cate)
  <section class="section-two">
      <div class="container">
          <div class="row">
              <div class="head">
                  <h4>{{ $cate->category }}</h4>
                  <a href="{!! route('category.dapps', $cate->id) !!}" style="text-decoration:none">See all</a>
              </div>
              <div class="body">
                  <div class="banner-slider1">
                      <div class="item ">
                        @php
                          $dapps = DB::table('dapps')->where('dapp_category', $cate->category)->inRandomOrder()->limit(5)->get();
                          $ads = DB::table('advertisements')->where('status', "Active")->inRandomOrder()->limit(4)->get();
                          $props = $ads[rand(0,3)];
                        @endphp
                      </div>

                      <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                          <a href="{!! route('ads.click', $props->id) !!}">
                          <img src="{!! asset('uploads') !!}/ads/{{ $props->ads }}" class="img-fluid"  alt="">
                          </a>
                        </div>
                      </div>
                      @forelse ($dapps as $key => $dapp)
                        <div class="item ">
                          <div class="item-one d-flex">
                            <a href="{!! route('history.index', $dapp->id) !!}" style="text-decoration:none">
                              <div class="img"><img src="{!! asset('uploads') !!}/logo/{{ $dapp->dapp_logo }}" alt=""></div>
                            </a>
                              <div class="text">
                                <a href="{!! route('history.index', $dapp->id) !!}" style="text-decoration:none">
                                  <h5>{{ $dapp->dapp_name }}</h5>
                                  <p>{{ $dapp->desc }}</p>
                                </a>
                              </div>
                          </div>
                      </div>
                      @empty
                        <p style="color:white">No Dapps not found!</p>
                      @endforelse
                  </div>
              </div>
          </div>
      </div>
    </section>
  @endforeach

@endsection
