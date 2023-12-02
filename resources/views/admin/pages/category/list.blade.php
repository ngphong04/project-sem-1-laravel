@extends('admin.main')
@section('title', 'Admin | Quản lí sản phẩm theo danh mục ')
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row" style="margin: 0">
                            <div class="pull-left">
                                <a href="{{ route('category.index') }}" class="btn btn-success">Back</a>
                            </div>
                            <div class="box-tools pull-right">
                                <div style="width: 150px;">
                                    <form action="" method="GET" class="input-group input-group-sm">
                                        <input type="text" name="key" class="form-control pull-right"
                                            placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
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
                                    <th>Danh mục</th>
                                    <th>Giá</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                                @forelse ($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->sale_price > 0 ? $item->sale_price : $item->price }}$</td>
                                        <td>
                                            <img src="{{ asset('storage/images') }}/{{ $item->image }}" width="100px"
                                                alt="">
                                        </td>
                                    </tr>
                                @empty
                                    <h4 class="">Danh mục {{ $category->name }} chưa có sản phẩm nào.</h4>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.box -->
    </section>
@endsection
