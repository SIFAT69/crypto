<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="This is a dapp listing website.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{!! asset('font') !!}/css/style.css">
    <link rel="stylesheet" href="{!! asset('font') !!}/css/slick.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style media="screen">
    /* Scrollbar Styling */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background-color: #ebebeb;
      -webkit-border-radius: 10px;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      -webkit-border-radius: 8px;
      border-radius: 8px;
      background: #0f58b5;
    }
    </style>
</head>

<body>
   @php
     $categories = DB::table('categories')->limit('6')->latest()->get();
     $ads = DB::table('advertisements')->where('id', 1)->first();
   @endphp
    <section class="header">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <div class="search ">
                        <div class="one">
                            <form class="from" id="form" role="search" action="{!! route('search.result') !!}" method="post">
                              @csrf
                                <input class="form-control me-2" type="search" id="keyword" @if(!empty($keyword)) value="{{ $keyword }}" @endif name="keyword" placeholder="Find the dapp here ...." aria-label="Search">
                                <i class='bx bx-search-alt' onclick="document.getElementById('form').submit()" ></i>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <ul>
                      <li><a href="{!! route('welcome') !!}">Home</a></li>
                      @foreach ($categories as $key => $value)
                        <li><a href="{!! route('category.dapps', $value->id) !!}">{{ $value->category }}</a></li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <a href="{!! route('ads.click') !!}">
        <img src="{!! asset('uploads') !!}/ads/{{ $ads->ads }}" class="img-fluid"  alt="">
        </a>
      </div>
    </div>


    @yield('content')

    <script type="text/javascript" src="{!! asset('font') !!}/js/jquery.min.js"></script>
    <script src="{!! asset('font') !!}/js/bootstrap.bundle.min.js"></script>
    <script src="{!! asset('font') !!}/js/owl.carousel.min.js"></script>
    <script src="{!! asset('font') !!}/js/jquery.syotimer.min.js"></script>
    <script src="{!! asset('font') !!}/js/slick.min.js"></script>
    <script src="{!! asset('font') !!}/js/jquery.counterup.min.js"></script>
    <script src="{!! asset('font') !!}/js/custom.js"></script>

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

</body>

</html>
