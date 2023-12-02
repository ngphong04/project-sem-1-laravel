@extends('admin.main')
@section('title', 'Admin | Quản lí sản phẩm')
@section('main-content')
    <section class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
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
                        <a href="{{ route('product.create') }}" class="btn btn-success">+Thêm mới Sản phẩm</a>

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
                                    <th>STT</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên</th>
                                    <th>Danh mục</th>
                                    <th>Giá</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                    <th>Tùy chọn</th>
                                    <th></th>
                                </tr>
                                @forelse ($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/images') }}/{{ $item->image }}" width="100px"
                                                alt="">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ number_format($item->price) }}đ</td>
                                        <td>{{ number_format($item->sale_price) }}đ</td>
                                        <td>{{ $item->available }}</td>
                                        <td style="display: flex">
                                            <a href="{{ route('product.preview', $item->id) }}"style="margin-right: 10px"><button
                                                    type="" class="border-0" class=""><i
                                                        class="fa fa-eye"></i></button></a></i></a>
                                            <a href="{{ route('product.show', $item) }}" style="margin-right: 10px"><button
                                                    type="" class="border-0" class=""><i
                                                        class="fa fa-image"></i></button></a></i></a>
                                            <a href="{{ route('product.edit', $item) }}" style="margin-right: 10px"><button
                                                    type="" class="border-0" class=""><i
                                                        class="fa fa-edit"></i></button></a>
                                            <form action="{{ route('product.destroy', $item) }}" method="POST">
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
                        {{ $product->links() }}
                    </ul>
                </div>

                <!-- /.box -->
            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection
