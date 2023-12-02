<header>
    @if (session()->has('Correct') && session('flash_expire') > now())
        <div class="alert alert-success">
            {{ session()->get('Correct') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="logo">
            <a href="{{ route('client.index') }}"><img
                    src="{{ asset('assets-client') }}/img/logo/kisspng-jumpman-t-shirt-air-jordan-logo-nike-michael-jordan-5ac0b5c05b5c29.1901510115225788803742-removebg-preview.png"
                    alt=""></a>
        </div>
        <div class="contact">
            <a href="{{route('client.findStore')}}">Cửa hàng</a>
            {{-- <p>|</p>  
            <a href=""><i class="fa-regular fa-heart"></i></a>
            <p>|</p>  
            <a href="{{route('client.cart')}}"><i class="fa-solid fa-cart-shopping"></i></a>
            <p>|</p>
            @if (Auth::check())
              <span class="hidden-xs">{{Auth::user()->fullName}}</span>
            @else
              <span class="hidden-xs"><a href="{{route('client.login')}}"><i class="fa-solid fa-user"></i></a></span>
            @endif   --}}
        </div>
    </div>
</header>
