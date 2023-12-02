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
            <a href="index.html"><img src="{{ asset('assets-client') }}/img/logo/tải_xuống-removebg-preview.png" alt=""></a>
        </div>
        <div class="titel">
            <p>Cập nhật thông tin</p>
        </div>
        <form action="{{ route('profile.update',$user->id) }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" name="fullName"
                        value="{{$user->fullName}}" class="form-control"
                        id="exampleInputEmail1">
                    @error('fullName')
                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" name="phone_number" value="{{$user->phone_number}}" class="form-control" id="exampleInputEmail1" placeholder="Hãy nhập số điện thoại">
                    @error('phone_number')
                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control" id="exampleInputEmail1" placeholder="Hãy nhập địa chỉ">
                    @error('address')
                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Avatar</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputEmail1" >
                    @error('photo')
                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                    @enderror
                  </div>
    
                  <img src="{{asset('storage/images')}}/{{$user->image}}" width="100px" class="mb-3" alt="">
    
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </main>
@endsection
