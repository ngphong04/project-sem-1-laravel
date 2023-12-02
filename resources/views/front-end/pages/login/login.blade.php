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

        .form-control {
            margin: auto;
            width: 50%;
            align-items: center
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
        .form-outline{
            width: 50%;
        }
        .btn-secondary {
            width: 50%;
            background-color: #111111;
            align-items: center;
            display: flex;
            text-align: center;
            flex-direction: column;

        }
        form>.alert-success {
            display: flex;
            align-items: center;
            justify-content: center;
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
            <p>Đăng nhập</p>
        </div>
        <form method="post" action="{{ route('client.postlogin') }}">
            @csrf
            <div class="d-flex flex-column align-items-center mb-4">
                <div class="form-outline flex-fill mx-auto">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{!! $message !!}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{!! $message !!}</strong>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu"
                    name="password">
            </div>
            <a class="form-control" style="border: none;color: blue" href="{{ route('client.forgotPassword') }}"><small>Quên mất khẩu?</small></a>
            <div class="text">
                <a href="">Bằng cách đăng nhập, bạn đồng ý với Chính sách quyền riêng tư của chúng tôi
                </a>
            </div>
            <button type="submit" class="btn btn-secondary form-control">ĐĂNG NHẬP</button>
            <div class="join">
                <a href="{{ route('client.register') }}">Chưa có tài khoản? Đăng ký</a>
            </div>
        </form>
    </main>
@endsection
