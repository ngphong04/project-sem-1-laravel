@extends('admin.main')
@section('title', 'Admin | Quản lí đơn hàng')
@section('main-content')
    <section class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <form action="" role="form">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="key" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" style="margin-top: 20px">
                        <tbody>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Tùy chọn</th>
                                <th></th>
                            </tr>
                            @forelse ($order as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->fullName }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                {!! '<span class="label label-default">Chưa xử lí</span>' !!}
                                            @break

                                            @case(1)
                                                {!! '<span class="label label-info">Đang chuẩn bị</span>' !!}
                                            @break

                                            @case(2)
                                                {!! '<span class="label label-primary">Đang giao</span>' !!}
                                            @break

                                            @default
                                                {!! '<span class="label label-success">Đã giao</span>' !!}
                                        @endswitch
                                    </td>
                                    <td>{{ number_format($item->total_price) }}đ</td>
                                    </td>
                                    <td style="display: flex">
                                        <a href="{{ route('order.edit', $item) }}" style="margin-right: 10px"><button
                                                type="" class=""><i class="fa fa-edit"></i></button></a>
                                        <form action="{{ route('order.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa')" class=""><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <h2 class="text-center">Chưa có đơn hàng!!!</h2>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->

        </section>
    @endsection
