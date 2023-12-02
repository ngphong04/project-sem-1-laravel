@extends('admin.main')
@section('title', 'Admin | Thêm mới danh mục')
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
                                <h3 class="box-title">Thêm mới danh mục</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('category.index') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('category.store') }}" method="POST" role="form">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="name" class="form-control" id="category_name"
                                    value="{{ old('name') }}" onkeyup="ChangeToSlug()">
                                @error('name')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục cha </label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="">Chọn danh mục cha</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="slug" class="form-control" id="slug"
                                value="{{ old('slug') }}">
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
@section('custom_script')
    <script src="{{ asset('assets-server/ckeditor') }}/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script language="javascript">
        function ChangeToSlug() {
            var category_name, slug;

            //Lấy text từ thẻ input title 
            category_name = document.getElementById("category_name").value;

            //Đổi chữ hoa thành chữ thường
            slug = category_name.toLowerCase();

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
