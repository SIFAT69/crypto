@extends('layouts.app')
@section('content')
<section class="section-two">
    <div class="container">
        <div class="row">

            <div class="body">
                <div class="banner-slider1">
                    <div class="item ">
                    </div>
                    @forelse ($dapps as $key => $dapp)
                      <div class="item ">
                        <div class="item-one d-flex">
                          <a href="{{ $dapp->dapp_link }}">
                            <div class="img"><img src="{!! asset('uploads') !!}/logo/{{ $dapp->dapp_logo }}" alt=""></div>
                          </a>
                            <div class="text">
                              <a href="{{ $dapp->dapp_link }}" style="text-decoration: none">
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
@endsection
