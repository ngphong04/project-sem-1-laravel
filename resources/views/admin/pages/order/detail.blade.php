@extends('admin.main')
@section('title', 'Admin | Chi tiết đơn hàng')
@section('main-content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row" style="margin: 0">
                    <div class="pull-left">
                        <h3 class="box-title">Thông tin đơn hàng</h3>
                        <a href="{{route('invoice.index', $order->id)}}" class="btn btn-primary">In hóa đơn</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('order.index') }}" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>
            <div class="box-body with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-md-4">Thông tin khách hàng</th>
                                            <th class="col-md-6"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Người đặt hàng</td>
                                            <td>{{ $order->user->fullName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đặt hàng</td>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mã đơn hàng</td>
                                            <td>{{ $order->code }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-md-4">Thông tin vận chuyển</th>
                                            <th class="col-md-6"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Người nhận</td>
                                            <td>{{ $order->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $order->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>{{ $order->address }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="" style="padding: 20px">
                                <label for="">Lưu ý của khách hàng: </label>
                                <p>{{ $order->note }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-12" style="padding: 0">
                            <table id="myTable" class="table table-bordered dataTable" role="grid"
                                aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting col-md-1">STT</th>
                                        <th class="sorting_asc col-md-3">Tên sản phẩm</th>
                                        <th class="sorting col-md-2">Size</th>
                                        <th class="sorting_asc col-md-2">Giá sản phẩm</th>
                                        <th class="sorting col-md-2">Số lượng</th>
                                        <th class="sorting col-md-2">Thành tiền</th>
                                </thead>
                                <tbody>
                                    @foreach ($order_details as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>@switch($item->size)
                                                @case(0)
                                                    M
                                                    @break
                                                @case(1)
                                                    L
                                                    @break
                                                @case(2)
                                                    XL
                                                    @break
                                                @default
                                                    XXL
                                            @endswitch</td>
                                            <?php $last_price = $item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price; ?>
                                            <td>{{ number_format($last_price) }}đ</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($last_price * $item->quantity) }}<b class="text-red"> đ</b></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td><b>Tổng tiền + Ship</b></td>
                                    <td><b class="text-red"> {{ number_format($order->total_price) }}đ</b></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('order.update', $order) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-inline">
                                <label>Trạng thái đơn hàng: </label>
                                <select name="status" class="form-control input-inline" style="width: 200px">
                                    @if ($order->status == 0)
                                        <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chưa xử lý
                                        </option>
                                        <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang chuẩn bị
                                            hàng</option>
                                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang giao
                                        </option>
                                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã giao</option>
                                    @elseif($order->status == 1)
                                        <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang chuẩn bị
                                            hàng</option>
                                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang giao
                                        </option>
                                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã giao</option>
                                    @elseif($order->status == 2)
                                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang giao
                                        </option>
                                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã giao</option>
                                    @else
                                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã giao</option>
                                    @endif
                                </select>

                                <input type="submit" value="Cập nhật" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
