@extends('front-end.master')
@section('css')
    <style>
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

        .form-control,.form-controls {
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
            color: rgb(179, 178, 178);
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
            color: gray;
            font-size: 12px;
            text-decoration: none;
        }

        .form-check {
            margin-top: 30px;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
        }

        .form-check-label {
            margin-left: 15px;
            font-size: 12px;
            color: gray;
        }

        .btn-secondary {
            width: 50%;
            background-color: #111111;
            align-items: center;
            display: flex;
            text-align: center;
            flex-direction: column;
        }

        .btn-secondary :hover {
            background-color: rgb(179, 178, 178);
        }

        #gender1 {
            width: 150px;
            margin-right: 25px;
            background-color: white;
            border: 1px solid rgb(177, 177, 177);
            padding: 5px;
        }

        #gender {
            width: 150px;
            background-color: white;
            border: 1px solid rgb(177, 177, 177);
            padding: 5px;
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
            header {
                display: none;
            }

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
            <p>BECOME A NIKE MEMBER</p>
        </div>
        <form action="{{ route('client.postRegister') }}" method="POST">
            @csrf
            <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1"value="{{old('email')}}" aria-describedby="emailHelp"
                    placeholder="Email" name="email">
                @error('email')
                    <small id="helpId" class="form-text text-danger form-controls">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputFirstName" value="{{old('fullName')}}" aria-describedby="textlHelp"
                    placeholder="Họ và tên" name="fullName">
                @error('fullName')
                    <small id="helpId" class="form-text text-danger form-controls">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" value="{{old('password')}}" placeholder="Mật khẩu"
                name="password">
                @error('password')
                    <small id="helpId" class="form-text text-danger form-controls">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="exampleInputPassword1" value="{{old('confirm_password')}}" placeholder="Xác nhận mật khẩu"
                    name="confirm_password">
                @error('confirm_password')
                    <small id="helpId" class="form-text text-danger form-controls">{{ $message }}</small>
                @enderror
            </div>
            

            <div class="text">
                <a href="">Bằng cách đăng ký, bạn đã đồng ý với Chính sách quyền riêng tư của chúng tôi</a>
            </div>
            <button type="submit" class="btn btn-secondary form-control">Đăng ký</button>
            <div class="join">
                <a href="{{ route('client.login') }}">Đã có tài khoản? Đăng nhập</a>
            </div>
        </form>
    </main>
@endsection
