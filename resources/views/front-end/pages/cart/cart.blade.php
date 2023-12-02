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

        @media screen and (max-width: 767px) {
            thead {
                display: none;
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
    </style>
@endsection
@section('main-content')
    <main>
        <div class="container">
            <div class="head-main mt-3">
                @if (count($cart->list()) > 0)
                    <h4>Giỏ Hàng Của Bạn</h4>
                    <table class="table">
                        <thead>
                            <tr class="cart-product">
                                <td></td>
                                <td>Sản phẩm</td>
                                <td>Đơn giá</td>
                                {{-- <td class="product-quantity">Số lượng</td> --}}
                                <td class="product-subtotal">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->list() as $key => $item)
                                <tr class="cart-product">
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td class="product-remove">
                                        <img src="{{ asset('storage/images') }}/{{ $item['image'] }}" alt="">
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

                                        {{-- <span>({{ $item['size'] }})</span> --}}
                                        <form method="get"
                                            action="{{ route('cart.update', ['id' => $item['productId']]) }}">
                                            <div class="form-addcart">
                                                <div class="buy-amount d-flex">
                                                    <button type="button" class="minus-btn"
                                                        onclick="handleMinus({{ $item['productId'] }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 12h-15" />
                                                        </svg>
                                                    </button>
                                                    <input type="text" name="quantity"
                                                        id="amount-{{ $item['productId'] }}"
                                                        value="{{ $item['quantity'] }}">
                                                    <button type="button" class="plus-btn"
                                                        onclick="handlePlus({{ $item['productId'] }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 4.5v15m7.5-7.5h-15" />
                                                        </svg>
                                                    </button>

                                                </div>
                                            </div>
                                            <input type="submit" value="Cập nhật" class="btn btn-success mt-2">
                                        </form>
                                    </td>
                                    <td class="product-price">
                                        {{ number_format($item['price']) }}đ
                                    </td>

                                    <td class="total">{{ number_format($item['price'] * $item['quantity']) }}đ</td>
                                    <td>
                                        <a href="{{ route('cart.remove', ['id' => $item['productId']]) }} "
                                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="buy">
                        <h6 class="return">

                            <a href="{{route('client.index')}}" class="btn btn-primary">Tiếp tục</a>
                            <a href="{{ route('cart.clear') }}"><button type="submit" class="btn btn-danger">Xóa tất
                                    cả</button></a>
                        </h6>

                        <h6 href="" class="pay">
                            <div class="pr-2">
                                Tổng số tiền({{ $cart->getTotalQuantity() }} Sản Phẩm ):
                                {{ number_format($cart->getTotalPrice()) }}
                                đ
                            </div>

                            <a href="{{ route('client.pay') }}" class="btn btn-primary">Thanh toán</a>
                        </h6>

                    </div>
                @else
                    <div class="cart">
                        <div class="cart-img"></div>
                        <div class="cart-text">Giỏ hàng của bạn còn trống</div>
                        <a href="{{ route('client.index') }}" class="pt-2">
                            <button class="btn btn-success">MUA NGAY</button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </main>
    <script>
        let render = (productId, amount) => {
            let amountElement = document.getElementById(`amount-${productId}`);
            if (amountElement) {
                amountElement.value = amount;
            }
        }

        let handlePlus = (productId) => {
            let amountElement = document.getElementById(`amount-${productId}`);
            let amount = parseInt(amountElement.value) || 1;
            amount++;
            render(productId, amount);
        }

        let handleMinus = (productId) => {
            let amountElement = document.getElementById(`amount-${productId}`);
            let amount = parseInt(amountElement.value) || 1;
            if (amount > 1) {
                amount--;
                render(productId, amount);
            }
        }

        // Nhập số vào
        let handleInput = (productId) => {
            let amountElement = document.getElementById(`amount-${productId}`);
            let inputValue = parseInt(amountElement.value);
            let amount = isNaN(inputValue) || inputValue < 1 ? 1 : inputValue;
            render(productId, amount);
        }
    </script>
@endsection
