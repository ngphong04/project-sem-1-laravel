<div class="menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('client.index') }}">Trang chủ</a>
                    </li>
                    @foreach ($categories as $item)
                        <li class="nav-item active">
                            <a class="nav-link"
                                href="{{ route('client.list', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                        </li>
                    @endforeach


                </ul>

                <div class="form-inline my-0 my-lg-0">
                    <form action="{{route('client.list')}}" class="form-inline">
                        <div class="input-group">
                            <input class="form-control1" type="text" name="key" placeholder="tìm kiếm">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <button class="buttons" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="contact">
                        <div class="icon_cart" style=" position:relative ">
                            @if ($cart->getTotalQuantity() > 0)
                                <a href="{{ route('client.cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                                <span class="total-count">
                                    @if ($cart->getTotalQuantity() > 99)
                                        +99
                                        <style>
                                            .total-count {
                                                position: absolute;
                                                top: -8px;
                                                right: 4px;
                                                background: #f6931d;
                                                width: 17px;
                                                height: 17px;
                                                line-height: 17px;
                                                text-align: center;
                                                color: #fff;
                                                border-radius: 100%;
                                                font-size: 8px;
                                            }
                                        </style>
                                    @elseif($cart->getTotalQuantity() < 100 && $cart->getTotalQuantity() > 10)
                                        {{ $cart->getTotalQuantity() }}
                                        <style>
                                            .total-count {
                                                position: absolute;
                                                top: -8px;
                                                right: 4px;
                                                background: #f6931d;
                                                width: 17px;
                                                height: 17px;
                                                line-height: 17px;
                                                text-align: center;
                                                color: #fff;
                                                border-radius: 100%;
                                                font-size: 10px;
                                            }
                                        </style>
                                    @else
                                        {{ $cart->getTotalQuantity() }}
                                        <style>
                                            .total-count {
                                                position: absolute;
                                                top: -8px;
                                                right: 4px;
                                                background: #f6931d;
                                                width: 17px;
                                                height: 17px;
                                                line-height: 17px;
                                                text-align: center;
                                                color: #fff;
                                                border-radius: 100%;
                                                font-size: 11px;
                                            }
                                        </style>
                                    @endif
                                </span></a>
                            @else
                                <a href="{{ route('client.cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                            @endif
                        </div>
                        <p>|</p>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark d-flex" href="#" id="dropdownId" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                @if (Auth::check())
                                    <span class="hidden-xs">{{ Auth::user()->fullName }} <i
                                            class="fa-solid fa-caret-down"></i></span>
                                @else
                                    <span class="hidden-xs"><a href="{{ route('client.login') }}"><i
                                                class="fa-solid fa-user"></i></a></span>
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                @if (Auth::check())
                                    <a class="dropdown-item" href="{{route('orderClient.index')}}">Đơn hàng</a>
                                    <a class="dropdown-item" href="{{route('profile.index')}}"><i class="fa-solid fa-gear mr-2"></i>Cài đặt</a>
                                    <a class="dropdown-item" href="{{ route('client.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>Đăng Xuất</a>
                                @endif
                            </div>
                        </li>



                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
