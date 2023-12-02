@extends('admin.main')
@section('title', 'Hóa đơn bán hàng')
@section('css')
    <style>
        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 2cm;
            }
        }
    </style>
@endsection
@section('main-content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row" style="margin: 0">
                    <div class="pull-left">
                        <h3 class="box-title">Hoá đơn</h3>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('order.index') }}" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>
            <div class="box-body with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div id="invoice">
                            <div class="row">
                                
                                <h1 class="text-center">Phiếu xuất kho</h1>
                                <div class="col-md-6">
                                    <table class="table border-none">
                                        <thead>
                                            <tr>
                                                <th class="col-md-4">Thông tin vận chuyển</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Người gửi:  LK SHOP</td>
                                            </tr>
                                            <tr>
                                                <td>Mã Vận Đơn: {{ $order->code }} </td>
                                            </tr>
                                            <tr>
                                                <td>Người nhận:  {{ $order->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại:  {{ $order->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ:  {{ $order->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lưu ý của khách hàng:  {{ $order->note }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                <td>
                                                    @switch($item->size)
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
                                                    @endswitch
                                                </td>
                                                <?php $last_price = $item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price; ?>
                                                <td>{{ number_format($last_price) }} đ</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($last_price * $item->quantity) }}<b class="text-red"> đ</b></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <td><b>Tổng tiền + ship</b></td>
                                        <td><b class="text-red"> {{ number_format($order->total_price) }} đ</b></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id="BtnPrint" onclick="InHoaDon()" class="btn btn-primary pull-right">In hoá đơn</button>
            </div>
        </div>
    </section>
@endsection
@section('custom_script')
    <script type="text/javascript">
        function InHoaDon() {
                var data = $('#invoice').html();
                document.body.innerHTML = data;
                window.print();
                window.location.reload();
        }
        </script>
    @endsection
