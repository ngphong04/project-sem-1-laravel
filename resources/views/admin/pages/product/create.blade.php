@extends('admin.main')
@section('title', 'Admin | Thêm mới sản phẩm')
@section('main-content')
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-xs-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row" style="margin: 0">
                            <div class="pull-left">
                                <h3 class="box-title">Thêm mới sản phẩm</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('product.index')}}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('product.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="productName">Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" id="productName" onkeyup="ChangeToSlug();">
                                        @error('name')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Chọn danh mục</label>
                                        <select class="form-control" value="{{ old('category_id') }}" name="category_id"
                                            id="">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                                            <input type="number" name="price" class="form-control"
                                                value="{{ old('price') }}" id="exampleInputEmail1">
                                            @error('price')
                                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                            <input type="number" name="sale_price" class="form-control"
                                                value="{{ old('sale_price') }}" id="exampleInputEmail1">
                                            @error('sale_price')
                                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Số lượng</label>
                                            <input type="number" name="available" class="form-control"
                                                value="{{ old('available') }}" id="exampleInputEmail1">
                                            @error('available')
                                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Đường dẫn</label>
                                        <input type="text" name="slug" class="form-control" id="slug"
                                            value="{{ old('slug') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                        <input type="file" name="photo" class="form-control" id="exampleInputEmail1">
                                        @error('photo')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ảnh mô tả </label>
                                        <input type="file" name="photos[]" class="form-control" id="exampleInputEmail1"
                                            multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea name="description" id="editor1" rows="10" cols="80" value="{{ old('description') }}">
                            </textarea>
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
@section('custom_script')
    <script src="{{ asset('assets-server/ckeditor') }}/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script language="javascript">
        function ChangeToSlug() {
            var productName, slug;

            //Lấy text từ thẻ input title 
            productName = document.getElementById("productName").value;

            //Đổi chữ hoa thành chữ thường
            slug = productName.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
