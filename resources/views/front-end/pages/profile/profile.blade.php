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

        .avatar {
            margin-top: 10px;
            width: 120px;
            height: 120px;
            margin-left: 10px;
            object-fit: cover
        }

        .avatar {
            width: 9em;
            height: 9em;
            border-radius: 100%;
            border: 2px solid #fff;
            box-shadow: #000 0px 2px 8px 0px;
        }
        .nut_bam{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection
@section('main-content')
    <div class="main-content">
        <div class="profile-head">
            <div class="row ">
                <div class="col-xl-6 text-center mx-auto align-self-center ">
                    <img src="{{asset('storage/images')}}/{{$user->image}}" class="avatar mb-3 mt-5" alt="">
                    <h1 class="fw-bold mb-4 fs-1">{{ $user->fullName }}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <p>Email: {{ $user->email }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <p>Số điện thoại: {{ $user->phone_number ? $user->phone_number : 'Chưa có thông tin' }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <p>Địa chỉ: {{ $user->address ? $user->address : 'Chưa có thông tin' }}</p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <div class="nut_bam" >
        <a href="{{route('profile.edit',$user->id)}}">
            <button class="btn btn-outline-dark fw-bolder fs-7 px-4 py-2 mt-3 rounded-pill mr-3">Cập nhật thông tin</button>
        </a>
        <a href="{{route('client.change_pass')}}">
            <button class="btn btn-outline-dark fw-bolder fs-7 px-4 py-2 mt-3 rounded-pill">Đổi mật khẩu</button>
        </a>
    </div>
@endsection
