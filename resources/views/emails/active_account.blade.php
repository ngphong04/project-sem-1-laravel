<div style="width:600px; margin: 0 auto">
    <div style="text-align:center">
        <h2>Xin chào {{$user->fullName}}</h2>
        <p>Bạn đã đăng ký tài khoản tại hệ thống của chúng tôi</p>
        <p>Để sử dụng dịch vụ vui lòng bấm vào nút bên dưới để kích hoạt tài khoản</p>
        <p>
            <a href="{{route('client.actived',['user' => $user->id , 'token'=> $user->token])}}" style="display:inline-block; background: green; color:#fff; padding:7px 25px; font-weight:bold">Kích hoạt tài khoản</a>
        </p>
    </div>
</div>