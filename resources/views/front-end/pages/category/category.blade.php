@extends('front-end.master')
@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;

        }

        a:hover {
            text-decoration: none;

        }

        .card-image img {
            width: 100%;
        }

        .category .card-image {
            overflow: hidden;
            /* width: 450px; */
        }

        .category img {
            transform: scale(1.2) rotate(1deg);
            transition: 0.75s;
        }

        .category .card-image:hover img {
            transform: scale(1) rotate(0);
        }

        .container a.btn {
            opacity: 0;
            transition: 0.75s all;
            position: absolute;
            bottom: -40px;
            font-weight: bold;
            z-index: 2;
        }

        .container .card-image .img-hide {
            position: absolute;
            transition: 0.75s all;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .category .card-image {
            position: relative;
        }

        .category .card-image:hover a.btn {
            opacity: 1;
            bottom: 0;
        }

        .category .card-image:hover .img-hide {
            z-index: 1;
        }

        .card-title {
            color: #000;
            font-size: 15px;
        }

        .card-text {
            color: #000;
        }

        .col-md-6 {
            padding: 0;
        }

        .col-lg-6 .row .col-lg-6 p {
            text-transform: none;
        }

        .row .col-lg-6 h2 {
            font-size: 20px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            margin-bottom: 15px !important;
        }

        .col-lg-6 .row .col-lg-4 h2 {
            font-size: 20px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            margin-bottom: 15px !important;
        }

        .col-lg-6 .row .col-lg-4 p {
            text-transform: none;
            font-size: 15px;
        }

        .col-lg-6 .row .col-lg-4 p:hover {
            color: yellowgreen;
        }

        .row .col-lg-3 h2 {
            padding-top: 60px;
            padding-bottom: 10px;
            font-family: "Archivo Narrow", sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #626262;
            text-transform: uppercase;
        }

        .table tr td {
            vertical-align: middle !important;
        }

        .table tr .ten-sanpham:hover {
            color: yellowgreen;
        }

        .text-center .row .col-md-8 a {
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            text-transform: uppercase;
            vertical-align: middle;
            line-height: 30px;
            margin-left: 20px;
        }

        .text-center .row .col-md-4 .row .col-md-6 h3 {
            margin-bottom: 20px;
            font-size: 17px;
            font-weight: 500;
            color: #515356;
            text-transform: uppercase;
            vertical-align: middle;
            line-height: 30px;
        }

        .form-control {
            width: 200px;
            border-radius: 50px;
        }

        .ps-table--size {
            display: block;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }

        .row .col-lg-3 a {
            color: black;
            /* border: 1px solid black; */
            /* margin-bottom: 15px; */
        }

        .row .col-lg-3 a:hover {
            color: orange;
        }

        .row .col-lg-3 table {
            background-color: transparent;
            border-spacing: 0;
            border-collapse: collapse;
        }

        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }

        .ps-table--size tbody>tr>td.active,
        .ps-widget--sidebar .ps-table--size tbody>tr>td:hover {
            background-color: #2AC37D;
            color: #fff;
        }

        .ps-table--size tbody>tr>td {
            width: 45px;
            height: 45px;
            vertical-align: middle;
            text-align: center;
            cursor: pointer;
            font-size: 13px;
            border: 1px solid #e4e4e4;
        }

        label.error {
            font-style: italic;
            color: red;
            font-size: 12px;
        }

        input.error {
            border: 1px solid red;
        }

        .col-md-8 .btn-primary {
            width: 33%;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        .col-md-8 .btn-primary:hover {
            background-color: goldenrod;
        }

        .form-group label {
            color: black !important;
        }

        .py-5 {
            padding-bottom: 0 !important;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        a {
            outline: none;
        }





        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
            padding-top: 15px
        }

        .pagination>li {
            display: inline;
        }

        .pagination>li:hover a {
            color: #000;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 10px;
            margin-left: -1px;
            line-height: 1.25;
            /* border-radius: 52%; */
            color: #000;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            /* pointer-events: none; */
            cursor: auto;
            background-color: #fff;
            border-color: #dee2e6;
        }

        .page-item.active .page-link {
            background: #000;
            border: 1px solid #000;
            color: white;
        }




        @media only screen and (max-width: 480px) {
            .ps-masonry__filter li a {
                color: #000;
            }

            .small-img-item {
                width: 80%;
                flex-direction: column-reverse;
            }

            .col-md-1 {
                width: 50%;
                flex-direction: column-reverse;

            }

            .col-md-6 h1 {
                font-size: 20px;
            }

            .col-md-6 a {
                font-size: 10px;
            }

            .col-md-6 p {
                font-size: 10px;
            }


            .col-md-6 .btn {
                font-size: 10px;
            }

            .text-center .row .col-md-8 .btn {
                font-size: 10px;
            }

            .text-center .row .col-md-4 .row .col-md-6 {
                padding: 0;
            }
        }

        @media (max-width: 768px) {
            .new-arrival-banner {
                display: none;
            }
        }

        @media (max-width: 1000px) {
            .box {
                display: flex;
                flex-wrap: wrap;
            }

            .btn {
                width: 100%;
            }

            .form-group {
                margin: 0px 15px;
                display: flex;
                align-items: center;
            }

            .form-group label {
                display: inline-block;
                margin: 0.5rem;
                font-size: 10px;
            }

            .row .col-lg-3 h2 {
                padding-top: 15px;
                padding-bottom: 10px;
                font-family: "Archivo Narrow", sans-serif;
                font-size: 12px;
                font-weight: bold;
                color: #626262;
                text-transform: capitalize;
            }
        }
    </style>
@endsection
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <h2 class="menu-toggle">Danh mục</h2>
                <div class="box">
                    <div class="form-group">
                        <a href=" {{ route('client.list') }} " for="all-category">
                            Tất cả 
                            ({{$totalInCategory}})   
                        </a>
                    </div>
                    @foreach ($categories as $item)
                        <div class="form-group">
                            <a href=" {{ route('client.list', ['slug' => $item->slug]) }} " for="men-category">
                                {{ $item->name }}
                                ({{ isset($totalProductsInCategory[$item->id]) ? $totalProductsInCategory[$item->id] : 'Không có' }})
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="col-lg-9">
                <div class="category py-5">
                    <div class="container">
                        <div class="row">
                            @forelse ($products as $item)
                                <div class="col-md-3 product-content">
                                    <div class="card text-center mb-3">
                                        <div class="card-image">
                                            <a href="{{ route('client.detail', ['slug' => $item->slug,'id' => $item->id]) }}">
                                                <img class="card-img-top"
                                                    src="{{ asset('storage/images') }}/{{ $item->image }}" alt="">
                                            </a>
                                            <a href="{{ route('client.detail', ['slug' => $item->slug,'id' => $item->id]) }}"
                                                class="btn btn-danger btn-block">Xem chi tiết</a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $item->name }}</h4>
                                            <p class="card-text"> {{ number_format($item->price) }}đ</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h2>KHÔNG CÓ SẢN PHẨM CẦN TÌM  </h2>
                            @endforelse
                        </div>
                    </div>
                </div>
                {{ $products->links() }}



            </div>
        </div>
    </div>
@endsection
