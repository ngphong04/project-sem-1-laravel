@extends('front-end.master')
@section('css')
    <style>
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

        .form-search {
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

        .logo-nike {
            width: 100px;
            margin: auto;
        }

        .logo-nike img {
            width: 100%;
        }

        .titel p {
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        form {
            margin: auto;
            width: 50%;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
        }

        .form-check-label {
            margin-left: 15px;
            font-size: 12px;
        }

        .form-check a {
            text-decoration: none;
            /* color: gray; */
            font-size: 12px;
            margin-left: 50px;
        }

        .text {
            display: flex;
            flex-direction: column;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .text a {
            color: rgb(179, 178, 178);
            font-size: 12px;
            text-decoration: none;
        }

        .btn-secondary {
            width: 100%;
            background-color: #111111;
        }

        .btn-secondary :hover {
            background-color: rgb(179, 178, 178);
        }

        .join {
            text-align: center;
            margin-top: 20px;
        }

        .join a {
            text-decoration: none;
            color: #111111;
            font-size: 12px;
        }

        @media screen and (max-width:960px) {
            .form-inline .form-control {
                display: none;
            }

            .icon a {
                display: block;
            }

            .banner .titel {
                display: none;
            }

            .card img {
                width: 100%;
            }

            .col-lg-3 {
                margin-bottom: 20px;
            }
        }

        @media screen and (max-width:600px) {
            .table-resonsive th {
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
    </style>
@endsection
@section('main-content')
    <main>
        <div class="logo-nike">
            <a href="index.html"><img src="{{ asset('assets-client') }}/img/logo/tải_xuống-removebg-preview.png"
                    alt=""></a>
        </div>
        <div class="titel">
            <p>Vui lòng nhập email mà bạn đã đăng ký trong hệ thống của chúng tôi</p>
        </div>
        <form method="post" action="">
            @csrf
            <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">

                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email address" name="email">
                    @error('email')
                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                    @enderror
            </div>
            <div class="text">
                <a href="">By logging in, you agree to Nike's Privacy Policy</a>
            </div>
            <button type="submit" class="btn btn-secondary">Gửi email xác nhận</button>
        </form>
    </main>
@endsection
