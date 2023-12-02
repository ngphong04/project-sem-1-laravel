@extends('front-end.master')
@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .contact {
            display: flex;
        }

        .contact p {
            margin-right: 10px;
        }

        .contact a {
            margin-right: 10px;
            text-decoration: none;
            color: #111111;
        }

        .form-control {
            border-radius: 20px;
        }

        .icon {
            display: flex;
        }

        .icon a {
            font-size: 20px;
            margin: 15px;
            color: #111111;
            display: none;
        }

        .an {
            display: none;
        }

        .carousel-item {
            text-align: center;
            background-color: #f5f5f5f5;
            height: 30px;
        }

        .banner {
            position: relative;
        }

        .banner img {
            width: 100%;
        }

        .text {
            position: absolute;
            left: 50px;
            bottom: 100px;
        }

        .text h1 {
            font-weight: bold;
            color: white;
        }

        .text p {
            font-size: 18px;
            color: white;
        }

        .title p {
            font-size: 25px;
            margin-top: 50px;
            margin-left: 15px;
        }

        .card {
            overflow: hidden;
        }

        #card-img {
            transition: 1s;
            width: 100%;
            height: auto;
        }

        #card-img:hover {
            transform: scale(1.1);
            overflow: hidden;
        }

        /* .container-fluid .row .col-lg-4 .card {
                                            margin-bottom: 100px;
                                        } */

        .container-fluid .col-lg-4 .card a {
            text-decoration: none;
            color: #111111;
            overflow: hidden;

        }

        /* .product {
                                            margin-bottom: 100px;
                                        } */

        .desc {
            text-align: center;
            margin: 40px;
        }

        .desc a {
            color: #111111;
            text-decoration: none;

        }

        .desc h1 {
            font-size: 50px;
            font-weight: bolder;
        }

        .desc .tieude {
            font-weight: bold;
            font-size: larger;
        }

        .desc .nutbam {
            background-color: #111111;
            padding: 5px 20px;
            border-radius: 20px;
            color: white;
        }

        .desc .nutbam:hover {
            background-color: gray;
        }

        .mota .row .col-lg-3 a {
            text-decoration: none;
            color: #111111;
        }

        footer {
            background-color: #111111;
            padding: 20px;
            margin-top: 50px;
        }

        .footer .row .col-lg-3 a {
            text-decoration: none;
            color: white;
        }

        .footer-icon a {
            margin-right: 15px;
        }

        @media screen and (max-width:992px) {
            .mota .row .col-lg-3 {
                display: none;
            }

            footer .row .col-lg-3 {
                margin-bottom: 20px;
            }
        }

        @media screen and (max-width:960px) {
            header {
                display: none;
            }

            .form-inline .form-control {
                display: none;
            }

            .icon a {
                display: block;
            }

            .text {
                display: none;
            }
        }

        @media screen and (max-width:575px) {
            .menu .container {
                display: flex;
            }

            .icon {
                display: block;
                display: flex;
            }
        }

        @media screen and (max-width:451px) {
            .title p {
                font-size: 20px;
                margin-left: 20px;
            }
        }

        @media screen and (max-width:426px) {
            .desc h1 {
                font-size: 30px;
            }
        }

        .backTop {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid black;
            position: fixed;
            bottom: 40px;
            right: 10px;
            cursor: pointer;
            border-radius: 50%;
        }

        .backTop i {
            font-size: 25px;
        }

        .backTop:hover {
            background-color: pink;
        }
    </style>
@endsection
@section('main-content')
    <main>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <p>Save Up To 40%</p>
                </div>
                <div class="carousel-item">
                    <p>Hello Nike App</p>
                </div>
                <div class="carousel-item">
                    <p>Free Delivery</p>
                </div>
            </div>
        </div>
        <div class="banner">
            @foreach ($banners as $item)
                <img src="{{ asset('storage/images') }}/{{ $item->banner }}" alt="">
            @endforeach

        </div>
        @foreach ($categories as $category)
            <div class="product">
                <div class="title" style="font-weight:700">
                    <p>{{ $category->name }}</p>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($products[$category->id] as $item)
                            <div class="col-lg-4">
                                <div class="card">
                                    <a href="{{ route('client.detail', ['slug' => $item->slug, 'id' => $item->id]) }}"><img
                                            class="card-img-top" id="card-img"
                                            src="{{ asset('storage/images') }}/{{ $item->image }}" alt=""></a>
                                    <div class="card-body">
                                        <a href="{{ route('client.detail', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                            <h4 class="card-title">{{ $item->name }}</h4>
                                        </a>
                                        <span>
                                            @if ($item->available > 0)
                                                Còn : {{$item ->available}}
                                            @else
                                                Hết hàng
                                            @endif
                                        </span>
                                        <a href="{{ route('client.detail', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                            <p class="card-text">
                                                @if ($item->sale_price > 0)
                                                    {{ number_format($item->sale_price) }}đ
                                                    <small><s>{{ number_format($item->price) }}đ</s></small>
                                                @else
                                                    ${{ number_format($item->price) }}đ
                                                @endif
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="desc">
            <h1>ENHANCED AIR</h1>
            <a href="">
                <P>Không quy tắc. Không giới hạn. Bây giờ, một hệ thống đệm tải trọng điểm
                    mới đã xuất hiện để mang lại thêm sự thoải mái. Sắp ra mắt.</P>
            </a>
            <a class="nutbam" href="">Shop Air Max</a>
        </div>

        <div class="product">
            <div class="title">
                <p>Đừng Bỏ Lỡ</p>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <a href="{{ route('index.index') }}"><img class="card-img-top"
                                    src="{{ asset('assets-client') }}/img/banner/bnn1.webp" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="title">
                <p>Nổi Bật</p>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <a href="{{ route('index.index') }}"><img class="card-img-top"
                                    src="{{ asset('assets-client') }}/img/banner/bnn2.webp" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <div class="title">
                <p>Những Điều Cần Thiết</p>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <a href="{{ route('index.index') }}"><img class="card-img-top"
                                    src="{{ asset('assets-client') }}/img/banner/bnn3.webp" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <a href="{{ route('index.index') }}"><img class="card-img-top"
                                    src="{{ asset('assets-client') }}/img/banner/bnn4.webp" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <a href="{{ route('index.index') }}"><img class="card-img-top"
                                    src="{{ asset('assets-client') }}/img/banner/bnn5.jpeg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
