@extends('admin.main')
@section('title', 'Admin | Thêm mới banner')
@section('main-content')
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm mới banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('banner.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên banner</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    id="exampleInputEmail1">
                                @error('name')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner</label>
                                <input type="file" name="photo" class="form-control" id="exampleInputEmail1">
                                @error('photo')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn trạng thái</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" id="" checked
                                            value="1"> Hiện
                                        <input class="form-check-input" type="radio" name="status" id=""
                                            value="0"> Ẩn
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
