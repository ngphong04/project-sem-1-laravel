.@extends('admin.main')
@section('title', 'Admin | Cập nhật tài khoản')
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
                                <h3 class="box-title">Cập nhật tài khoản</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('user.update', $user) }}" method="POST" role="form">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên người dùng</label>
                                <input type="text" name="fullName" class="form-control" value="{{ $user->fullName }}"
                                    id="exampleInputEmail1">
                                @error('fullName')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}"
                                    id="exampleInputEmail1">
                                @error('email')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phân quyền</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="role" id=""
                                            value="0" {{ !$user->role ? 'checked' : '' }}> Client
                                        <input class="form-check-input" type="radio" name="role" id=""
                                            value="1" {{ $user->role ? 'checked' : '' }}> Admin
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>

                <!-- /.box -->

            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection
