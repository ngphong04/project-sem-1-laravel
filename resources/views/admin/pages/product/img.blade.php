@extends('admin.main')
@section('title', 'Admin | Quản lí sản phẩm')
@section('css')
    <style>
        .position {
            position: relative;
            padding: 20px
        }

        .position:hover .hovers {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            transition: 1s;
        }

        .hovers {
            top: 20px;
            right: 20px;
            background: red;
            position: absolute;
            border: 1px solid red;
            border-radius: 50%;
            display: none;
            width: 20px;
            height: 20px;
            font-size: 15px;
            text: center;
            color: aliceblue
        }

        .hovers a {
            color: white;
        }
    </style>
@endsection
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
                        <div class="row" style="margin: 0">
                            <div class="pull-left">
                                <h3 class="box-title">Ảnh mô tả sản phẩm</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('product.index') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                @forelse ($product_imgs as $item)
                                    <div class="col-md-3 position">
                                        <img src="{{ asset('storage/images') }}/{{ $item->image }}" style="width: 100%;"
                                            alt="">
                                        <div class="hovers"><a class=""
                                                href="{{ route('product_img.delete', $item->id) }}"><i
                                                    class="fa fa-trash"></i></a></div>
                                    </div>
                                @empty
                                    <h2 class="text-center">Chưa có dữ liệu!!!</h2>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <ul class="pagination">
                        {{ $product_imgs->links() }}
                    </ul>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.box -->
    </section>
@endsection
