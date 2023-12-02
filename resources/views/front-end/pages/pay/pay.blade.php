@extends('front-end.master')
@section('main-content')
    <main>
        <div class="container">
            <div class="head-main mt-5">
                <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <table class="table">
                        <thead>
                            <tr class="">
                                <td>Ảnh</td>
                                <td>Sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Số lượng</td>
                                <td>Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->list() as $key => $item)
                                <tr class="cart-product">
                                    <td scope="row" class="product-remove">
                                        <img src="{{ asset('storage/images') }}/{{ $item['image'] }}" alt=""
                                            width="80px" height="70px">

                                    </td>
                                    <td class="product-name">

                                        {{ $item['name'] }}(
                                        @switch(intval($item['size']))
                                            @case(0)
                                                M
                                            @break

                                            @case(1)
                                                L
                                            @break

                                            @case(2)
                                                XL
                                            @break

                                            @default
                                                2XL
                                        @endswitch
                                        )

                                    </td>
                                    <td class="product-price">
                                        {{ number_format($item['price']) }}đ
                                    </td>
                                    <td>x{{ $item['quantity'] }}</td>
                                    <td class="total">{{ number_format($item['price'] * $item['quantity']) }}đ</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="payment">
                        <div class="payment_method row">
                            <div class="col-lg-3">
                                <h6>Phương thức thanh toán:</h6>
                            </div>
                            <div class="form-group pl-3">
                                <input type="radio" value="1" checked>
                                <label for="">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <h5 class="">Thông tin khách hàng</h5>
                        <div class="form">
                            <div class="info col-12">
                                <div class="form-group col-6">
                                    <label for="comment" class="box-name">Người nhận hàng:</label>
                                    <input type="text" class="box pl-2" name='name' value="{{ Auth::check() ? Auth::user()->fullName : '' }}" >
                                    @error('name')
                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="comment" class="box-name">Phone:</label>
                                    <input type="text" class="box pl-2" name='phone'>
                                    @error('phone')
                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="comment" class="box-name">Địa chỉ:</label>
                                <input type="text" class="box" name='address'>
                                @error('address')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="comment">Ghi chú:</label>
                        <textarea class="form-control" rows="5" id="comment" name="note"></textarea>
                        
                    </div>

                    <div class="total_price mt-4">
                        <div class="col-lg-12 row">
                            <div class="col-lg-12 mt-3 d-flex">
                                <span>Tổng tiền hàng:</span>
                                <span> {{ number_format($cart->getTotalPrice()) }} đ</span>
                            </div>
                            <div class="col-lg-12 mt-3 d-flex">
                                <span>Phí vận chuyển:</span>
                                <span> 20000 đ</span>
                            </div>
                            <div class="col-lg-12 mt-3 d-flex">
                                <span>Tổng thanh toán:</span>
                                <div name="total_price"> {{ number_format($cart->getTotalPrice() + 20000) }}đ
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 submit">
                        <div class="pay">
                            <button type="submit" class="btn btn-success">Đặt hàng</button>
                        </div>
                    </div>
                </form>

                
            </div>
        </div>
        </div>
    </main>
@endsection
@section('css')
    <style>
        input {
            overflow: visible;

        }

        .form {
            background-color: #fff !important;
            border: 1px solid rgba(145, 158, 171, .239);
            border-radius: 10px;
            padding: 15px;
        }

        .form .form-group {
            display: flex;
            flex-direction: column;
        }

        .form>.info {
            display: flex;
        }

        .form .box {
            background-color: #fff;
            border: none;
            border-bottom: 1px solid rgba(145, 158, 171, .2);
            border-radius: 0;
            box-sizing: border-box;
            font-size: 15px;
        }



        .product-remove {
            width: 100px;
            height: 100px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .product-remove img {
            width: 100%;
        }

        .product-name {
            display: flex;
            justify-content: space-between;
        }

        @media screen and (max-width: 767px) {
            thead {
                display: none;
            }

            .return {
                display: none;
            }

            .total {
                display: none;
            }

            .product-price {
                /* display: none */
            }

            .product-name {
                display: flex;
                flex-direction: column;
            }

            .product-remove {
                width: 70px !important;
                height: 70px !important;
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: center;
                overflow: hidden;
            }

            .product-remove>img {
                width: 100%;
                height: auto;
            }
        }
    </style>
@endsection
