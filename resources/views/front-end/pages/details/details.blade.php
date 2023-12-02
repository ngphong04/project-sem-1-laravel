@extends('front-end.master')
@section('css')
    <style>
        .single-product .small-img img {
            margin-bottom: 5px;
            cursor: pointer;
            width: 100%;
            border-color: #8d8d8d;
            margin-bottom: 30px;
            border: 3px solid #e5e5e5;
            border-style: none;
        }

        .single-product .big-img img {
            margin-bottom: 20px;
            cursor: pointer;
            border-color: #8d8d8d;
            /* margin: 30px; */
            border: 3px solid #e5e5e5;
            border-style: none;
        }

        .single-product .col-md-6 {
            padding: 30px;
        }

        .single-product .container-fluid .row .col-md-6 h1 {
            color: #000;
        }

        .single-product .container-fluid .row .col-md-6 a {
            color: #5b5b5b;
            font-size: 14px;
            line-height: 1.5em;
            margin: 0 0 10px;
            outline: none;
            text-decoration: none;
        }

        .single-product .container-fluid .row .col-md-6 a:hover {
            color: yellowgreen;
        }

        .single-product .container-fluid .row .col-md-6 h3 {
            margin-bottom: 15px;
            font-family: "Archivo Narrow", sans-serif;
            font-size: 30px;
            color: #000;
            margin-top: 20px;
            font-weight: 500;
            line-height: 1.1;
        }

        .single-product .container-fluid .row .col-md-6 small {
            margin-left: 5px;
            font-size: 24px;
            color: #bcbcbc;
        }

        .single-product .container-fluid .row .col-md-6 a {
            text-transform: none;
            font-size: 20px;
        }

        .single-product .container-fluid .row .col-md-6>h4 {
            display: block;
            margin-bottom: 15px;
            padding-bottom: 10px;
            font-family: "Archivo Narrow", sans-serif;
            font-size: 18px;
            color: #313131;
            border-bottom: 1px solid #e5e5e5;
            margin-top: 10px;
            line-height: 1.1;
        }

        .single-product .container-fluid .row .col-md-6 p {
            font-family: "Montserrat", sans-serif;
            font-size: 30px;
            line-height: 1.8em;
            color: #5b5b5b;
            margin-bottom: 20px;
            text-transform: none;
        }




        label.error {
            font-style: italic;
            color: red;
            font-size: 12px;
        }

        input.error {
            border: 1px solid red;
        }

        .single-product .container-fluid .form-row .col-md-4 h3 {
            font-size: 30px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .single-product .container-fluid .form-row .col-md-4 .form-group .form-control {
            border-radius: unset;
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

        .form-group a {
            color: #000 !important;
        }

        .form-addcart .buy-amount button {
            width: 35px;
            height: 35px;
            outline: none;
            background: none;
            border: 1px solid #ececec;
            cursor: pointer;
        }

        .form-addcart .buy-amount button:hover {
            background-color: #ececec;
        }

        .form-addcart .buy-amount button svg {
            color: #909090;

        }

        .form-addcart .buy-amount button:hover svg {
            color: #4f4f4f;
        }

        .form-addcart .buy-amount #amount {
            width: 40px;
            text-align: center;
            border: 1px solid #ececec;
        }

        .reverse {
            display: contents;
        }

        .col-md-1 {
            padding-top: 3rem;
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

        @media only screen and (max-width: 767px) {
            .ps-masonry__filter li a {
                color: #000;
            }

            .reverse {
                display: flex;
                flex-direction: column-reverse;
            }

            .single-product .small-img img {
                width: 20%;
                display: flex;
                justify-content: space-around;
            }

            .col-md-1 {
                width: 100%;
                display: flex;
                justify-content: space-between;
                padding: 0px;
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

            .single-product .col-md-6 {
                padding: 20px 0 0 0 !important;
            }

            .text-center .row .col-md-8 .btn {
                font-size: 10px;
            }

            .text-center .row .col-md-4 .row .col-md-6 {
                padding: 0;
            }

            .pagination .container .row .col-md-6 {
                padding: 5px;
                margin-top: 5px;
            }

        }

        @media only screen and (max-width: 455px) {
            .banner-even {
                width: 100%;
            }

            .banner-even img {
                width: 100%;
            }
        }
    </style>
@endsection
@section('main-content')
    <main>
        <div class="single-product">
            <div class="container">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="reverse">
                        <div class="col-md-1 small-img">
                            @foreach ($images->take(5) as $image)
                                <img class="small-img-item" src="{{ asset('storage/images') }}/{{ $image->image }}"
                                    alt="">
                            @endforeach
                        </div>
                        <div class="col-md-6 big-img pt-5">
                            <img src="{{ asset('storage/images') }}/{{ $details->image }}" alt=""
                                style="width: 100%">
                        </div>
                    </div>

                    <div class="col-md-5 pt-5">
                        <h4>{{ $details->name }}</h4>
                        <h3>
                            @if ($details->sale_price > 0)
                                {{ number_format($details->sale_price) }}đ
                                <small><s>{{ number_format($details->price) }}đ</s></small>
                            @else
                                {{ number_format($details->price) }}đ
                            @endif
                        </h3>
                        <div class="banner-even py-3">
                            <img src="{{ asset('assets-client') }}/img/banner/bnn2.webp" alt=""
                                width="60%">
                        </div>

                        <div class="form-group">
                            <form action="{{ route('cart.add') }}" method="POST" class="form-inline" role="form"
                                style="display: flex;flex-direction: column;align-items: flex-start">
                                @csrf
                                <div class="swatch-size swatch pb-2">
                                    <div class="option-size">
                                        Kích thước:
                                        <span class="var" name='size'></span>
                                    </div>
                                    <div class="d-flex">

                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <div class="pr-2">
                                                        <input class="form-check-input" type="radio" name="size"
                                                            id="" value="0" checked onclick="showSize(this)">
                                                        M
                                                    </div>
                                                    <div class="pr-2">
                                                        <input class="form-check-input" type="radio" name="size"
                                                            id="" value="1" onclick="showSize(this)"> L
                                                    </div>
                                                    <div class="pr-2">
                                                        <input class="form-check-input" type="radio" name="size"
                                                            id="" value="2" onclick="showSize(this)"> Xl
                                                    </div>

                                                    <div class="pr-2"><input class="form-check-input" type="radio"
                                                            name="size" id="" value="3"
                                                            onclick="showSize(this)"> 2XL
                                                    </div>


                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="id" value="{{ $details->id }}">
                                <div class="d-flex">
                                    <div class="form-addcart">
                                        <div class="buy-amount d-flex">
                                            <button type="button" class="minus-btn" onclick="handleMinus()">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                </svg>
                                            </button>
                                            <input type="text" name="quantity" id="amount" value="1">
                                            <button type="button" class="plus-btn" onclick="handlePlus()">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-1 ml-3">Thêm vào giỏ hàng</button>
                                </div>

                            </form>
                            <script>
                                let amountElement = document.getElementById('amount')
                                let amount = amountElement.value
                                console.log(amountElement)
                                let render = (amount) => {
                                    amountElement.value = amount
                                }

                                // handlePlus
                                let handlePlus = () => {
                                    console.log(amount)
                                    amount++
                                    render(amount);
                                }

                                // handleMinus
                                let handleMinus = () => {
                                    console.log(amount)
                                    if (amount > 1) {
                                        amount--
                                    }
                                    render(amount)
                                }

                                // Nhập số vào
                                amountElement.addEventListener('input', () => {
                                    amount = amountElement.value;
                                    amount = parseInt(amount);
                                    amount = isNaN(amount) ? 1 : amount;
                                    render(amount);
                                })
                            </script>


                        </div>

                    </div>
                    <div class="col-12">
                        <h4>Thông tin sản phẩm </h4>
                        <div class="mx-auto" style="word-wrap: break-word">
                            {!! $details->description !!}
                        </div>

                    </div>
                    <div class="col-12">
                        <h4>Sản phẩm liên quan</h4>
                        <div class="category">
                            <div class="d-flex row">
                                @forelse ($relatedProducts as $item)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="card text-center">
                                            <div class="card-image">
                                                <a
                                                    href="{{ route('client.detail', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                                    <img class="card-img-top"
                                                        src="{{ asset('storage/images') }}/{{ $item->image }}"
                                                        alt="">
                                                </a>
                                                <a href="{{ route('client.detail', ['slug' => $item->slug, 'id' => $item->id]) }}"
                                                    class="btn btn-danger btn-block">Xem chi tiết</a>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $item->name }}</h4>
                                                <p class="card-text">{{ $item->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection
