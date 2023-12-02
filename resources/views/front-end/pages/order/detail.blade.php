@extends('front-end.master')
@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .form-addcart .buy-amount button {
            width: 30px;
            height: 30px;
            outline: none;
            /* padding: 10px; */
            background: none;
            border: 1px solid #ececec;
            cursor: pointer;
            display: flex;
            align-items: center;
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

        .form-addcart .buy-amount input {
            width: 30px;
            height: 30px;
            font-size: 12px;
            text-align: center;
            border: 1px solid #ececec;
            font-size: 14px
        }

        .cart {
            height: 18rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .cart .cart-img {
            width: 6.75rem;
            height: 6.125rem
        }

        .cart-img {
            background-position: 50%;
            background-size: cover;
            background-repeat: no-repeat;
            width: 12.5rem;
            height: 11.1875rem;
            background-image: url('assets-client/img/cart/No-Product.png');
        }

        .name {
            margin-left: 3px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            /* border-bott: 1px solid black !important; */
            padding: 0;
            width: auto;
            /* place-content: center; */
            /* border-top: 1px solid black !important; */
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

        .buy {
            display: flex;
            justify-content: space-between;
            padding: 0;
            margin: 0;
        }

        .pay {
            display: flex;
            align-items: center;

        }

        @media screen and (min-width: 455px) {}

        @media screen and (max-width: 991px) {

            thead {
                font-size: 11px
            }

            tbody {
                font-size: 11px
            }

            .details {
                display: none;
            }

            .button_anonymous {
                display: block;
            }

            .buttons_anonymous {
                display: none;
            }
        }

        @media screen and (max-width: 515px) {

            thead {
                font-size: 9px
            }

            tbody {
                font-size: 9px
            }

            .details {
                display: none;
            }
        }

        @media screen and (max-width: 767px) {
            thead {
                /* display: none; */
                font-size: 8px
            }

            /* .return {
                    display: none;
                } */
            .buy {
                display: flex;
                flex-direction: column;
            }

            .pay {
                display: flex;
                flex-direction: column;
            }

            .total {
                display: none;
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

        @media screen and (max-width: 767px) {
            .buy {
                display: flex;
                flex-direction: column;
            }

            .pay {
                display: flex;
                flex-direction: column;
            }

            .total {
                display: none;
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

        }
    </style>
@endsection
@section('main-content')
    <div class="box mt-5">
        <div class="box-header with-border">
            <div class="container">
                <h3 class=" text-center mt-3 mb-5">Chi tiết đơn hàng</h3>
                <div class="row">
                    <div class="col-md-12">
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                            aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting">STT</th>
                                    <th class="sorting_asc ">Tên sản phẩm</th>
                                    <th class="sorting_asc">Giá sản phẩm</th>
                                    <th class="sorting">Số lượng</th>
                                    <th class="sorting">Thành tiền</th>
                            </thead>
                            <tbody>
                                @foreach ($order_details as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <?php $last_price = $item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price; ?>
                                        <td>{{ $last_price }} <b class="text-red"> VNĐ</b></td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $last_price * $item->quantity }}<b class="text-red"> VNĐ</b></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td><b>Tổng tiền</b></td>
                                <td> {{ $total_price }} <b class="text-red">VNĐ</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
