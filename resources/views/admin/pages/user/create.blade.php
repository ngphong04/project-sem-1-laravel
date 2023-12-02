@extends('admin.main')
@section('title', 'Admin | Thêm mới tài khoản')
@section('main-content')
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row" style="margin: 0">
                            <div class="pull-left">
                                <h3 class="box-title">Thêm mới tài khoản</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('user.store') }}" method="POST" role="form">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên người dùng</label>
                                <input type="text" name="fullName" class="form-control" value="{{ old('fullName') }}"
                                    id="exampleInputEmail1">
                                @error('fullName')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                                    id="exampleInputEmail1">
                                @error('email')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                                    id="exampleInputEmail1">
                                @error('password')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control"
                                    value="{{ old('confirm_password') }}" id="exampleInputEmail1">
                                @error('confirm_password')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="role" id="" checked
                                            value="0">Client
                                        <input class="form-check-input" type="radio" name="role" id=""
                                            value="1">Admin
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>

                <!-- /.box -->

            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection
