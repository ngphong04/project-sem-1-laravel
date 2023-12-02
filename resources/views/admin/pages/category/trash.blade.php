@extends('admin.main')
@section('title', 'Admin | Thùng rác')
@section('main-content')
    <section class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- Default box -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row" style="margin: 0">
                            <div class="pull-left">
                                <h3 class="box-title">Thùng rác</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('category.index')}}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
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
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->parent ? $item->parent->name : '' }}</td>
                                        <td>{{ $item->level}}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{!! $item->status
                                            ? '<span class="label label-success">Hiển thị</span>'
                                            : '<span class="label label-danger">Tạm ẩn</span>' !!}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td style="display: flex">
                                            <a href="{{ route('category.restore', $item->id) }}"
                                                style="margin-right: 10px"><button type="" class="border-0"
                                                    class=""><i class="fa fa-refresh"></i></button></a>
                                            <a href="{{ route('category.forceDelete', $item->id) }}"
                                                class="text-danger"><button type="" class="border-0"
                                                    class="text-danger"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="text-center">Thùng rác trống!!!</h2>
                                @endforelse
                            </tbody>

                        </table>
                        <div class="box-footer d-flex">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xoá tất cả ?')"
                                href="{{ route('category.deleteAll') }}" class="btn btn-danger"><i class="fa fa-trash"> Xoá
                                    tất
                                    cả</i></a>
                            <a href="{{ route('category.restoreAll') }}" class="btn btn-primary">Khôi phục tất cả</a>
                        </div>
                    </div>
                    <!-- /.box-body -->
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
