@extends('admin.main')
@section('title', 'Admin | Quản lí danh mục')
@section('main-content')
    <section class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('product'))
            <div class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('category'))
            <div class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('trash'))
            <div class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- Default box -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('category.create') }}" class="btn btn-success">+Thêm mới Danh Mục</a>
                        <div class="box-tools">
                            <form action="" role="form">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="key" class="form-control pull-right"
                                        placeholder="Tìm theo tên">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-border ">
                            <tbody>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Danh mục cha</th>
                                    <th>Cấp</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                @forelse ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('category.show', $item) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->parent ? $item->parent->name : '' }}</td>
                                        <td>{{ $item->level}}</td>
                                        <td>{!! $item->status
                                            ? '<span class="label label-success">Hiển thị</span>'
                                            : '<span class="label label-warning">Tạm ẩn</span>' !!}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td style="display: flex">
                                            <a href="{{ route('category.edit', $item) }}" style="margin-right: 10px"><button
                                                    type="" class="border-0" class=""><i
                                                        class="fa fa-edit"></i></button></a>
                                            <form action="{{ route('category.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa')" class=""><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="text-center">Chưa có dữ liệu!!!</h2>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('category.trash') }}" class="btn btn-primary"><i class="fa fa-trash"> Thùng
                                rác</i></a>
                    </div>
                    <ul class="pagination">
                        {{ $categories->links() }}
                    </ul>
                </div>

                <!-- /.box -->
            </div>
        </div>
        <!-- /.box -->
    </section>
@endsection
