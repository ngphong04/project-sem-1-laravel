@extends('admin.main')
@section('title', 'Admin | Quản lí banner')
@section('main-content')
    <section class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- Default box -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('banner.create') }}" class="btn btn-success">+Thêm mới banner</a>

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
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên Banner</th>
                                    <th>Trạng thái</th>
                                    <th>Tùy chọn</th>
                                    <th></th>
                                </tr>
                                @forelse ($banner as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/images') }}/{{ $item->banner }}" width="200px"
                                                alt="">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{!! $item->status
                                            ? '<span class="label label-success">Hiển thị</span>'
                                            : '<span class="label label-warning">Tạm ẩn</span>' !!}</td>
                                        <td style="display: flex">
                                            <a href="{{ route('banner.edit', $item->id) }}" style="margin-right: 10px"><button type=""
                                              class="border-0" class=""><i class="fa fa-edit"></i></button></a>
                                            <form action="{{ route('banner.destroy', $item) }}" method="POST">
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
                    <ul class="pagination">
                        {{ $banner->links() }}
                    </ul>
                </div>

                <!-- /.box -->
            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection
