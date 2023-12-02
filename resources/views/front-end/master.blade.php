<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LK. Just Do It. LK VN </title>
    <link rel="shortcut icon" href="{{ asset('assets-client') }}/img/logo/tải_xuống-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets-client') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets-client') }}/css/style.css">

    <link rel="stylesheet" href="{{ asset('assets-client') }}/fontawesome-free-6.3.0-web/css/all.min.css">
    @yield('css')
</head>

<body>
    <div class="wrapper">
        @include('front-end.layouts.header')
        @include('front-end.layouts.menu')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('main-content')
            <!-- Main content -->
            <!-- /.content -->
        </div>
        <div class="backTop" id="backTop">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
        @include('front-end.layouts.footer')
    </div>

    <script src="{{ asset('assets-client') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets-client') }}/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $('#backTop').fadeIn();
                } else {
                    $('#backTop').fadeOut();
                }
            })
            $('#backTop').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 500)
            })
        })
        var previousScrollPosition = 0;
        window.onscroll = function() {
            var menuContainer = document.querySelector(".menu");
            var currentScrollPosition = window.pageYOffset;
            if (currentScrollPosition > previousScrollPosition) {
                // Cuộn xuống
                menuContainer.classList.remove("fixed-top");
            } else {
                // Cuộn lên
                if (currentScrollPosition > 100) { // Thay 100 bằng khoảng cách cụ thể bạn muốn
                    menuContainer.classList.add("fixed-top");
                } else {
                    menuContainer.classList.remove("fixed-top");
                }
            }
            previousScrollPosition = currentScrollPosition;
        };
        $('.small-img-item').click(function(e) {
            e.preventDefault(); //return flase
            var _src = $(this).attr('src');
            $('.big-img img').attr('src', _src);
            //alert(_src)
        });

        function showSize(radio) {
            var sizeText = '';

            switch (radio.value) {
                case '0':
                    sizeText = 'M';
                    break;
                case '1':
                    sizeText = 'L';
                    break;
                case '2':
                    sizeText = 'XL';
                    break;
                case '3':
                    sizeText = '2XL';
                    break;
                default:
                    sizeText = 'Unknown Size';
            }

            document.querySelector('.var').textContent = sizeText;
        }
    </script>

</body>

</html>
