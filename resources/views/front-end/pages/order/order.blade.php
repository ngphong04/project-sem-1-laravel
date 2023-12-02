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
        
        .buttons_anonymous {
            display: none;
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

            .buttons_anonymous {
                display: block;
                /* border: none !important; */
            }
            .button_anonymous {
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
                font-size: 10px
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
        <div class="container" style="margin-bottom: 100px">
            <div class="head-main mt-3">
                @if (count($order) > 0)
                    <h2 class="text-center mt-5 mb-5">Đơn hàng của bạn</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr class="cart-product text-center">
                                <th class="buttons_anonymous">Mã đơn hàng</th>
                                <th class="button_anonymous">Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th class="details">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($order as $item)
                                <tr class="cart-product">
                                    <td class="buttons_anonymous">
                                        <a href="{{ route('orderClient.edit', $item) }}">
                                            {{ $item->code }}
                                        </a>
                                    </td>
                                    <td class="button_anonymous">{{ $item->code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->total_price }} VND</td>
                                    <td>
                                        @if ($item->status == 3)
                                            <form action="{{ route('orderClient.update', $item) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">Đã nhận hàng</button>
                                                </div>
                                            </form>
                                        @else
                                            @switch($item->status)
                                                @case(0)
                                                    <?php echo ' Chưa xử lí '; ?>
                                                @break

                                                @case(1)
                                                    <?php echo ' Đang chuẩn bị hàng '; ?>
                                                @break

                                                @case(2)
                                                    <?php echo ' Đang giao '; ?>
                                                @break

                                                @case(4)
                                                    <?php echo ' Đã nhận được hàng'; ?>
                                                @break

                                                @default
                                            @endswitch
                                        @endif
                                    </td>
                                    <td class="details">
                                        <a href="{{ route('orderClient.edit', $item) }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
