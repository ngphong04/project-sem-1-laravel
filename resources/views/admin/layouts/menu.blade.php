<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets-server')}}/images/admin.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->fullName }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{{route('index.index')}}">
                    <i class="fa fa-home"></i> <span>Trang chủ</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('category.index')}}">
                    <i class="fa fa-bar-chart"></i> <span>Quản lý danh mục</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('product.index')}}">
                    <i class="fa fa-list-alt"></i> <span>Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('user.index')}}">
                    <i class="fa fa-users"></i> <span>Quản lý tài khoản</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('banner.index')}}">
                    <i class="fa fa-image"></i> <span>Quản lý banner</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('order.index')}}">
                    <i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span>
                </a>
            </li>

            {{-- <li>
                <a href="/admin">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span>
                </a>
            </li> --}}

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>