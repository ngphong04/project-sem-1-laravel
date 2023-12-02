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

        @media screen and (min-width: 455px) {}

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
            <h4 class="text-center mt-3">Cửa hàng của chúng tôi</h4>
            <div class="map mt-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.073349977116!2d105.77418981989972!3d21.04195344459717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab32dd484c53%3A0x4201b89c8bdfd968!2zMjM4IEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1701060071287!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </main>
@endsection
