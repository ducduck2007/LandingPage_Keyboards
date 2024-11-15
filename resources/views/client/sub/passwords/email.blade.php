<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>

<body>
    <h1>Quên mật khẩu</h1>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('client.password.email') }}">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Gửi liên kết đặt lại mật khẩu</button>
    </form>
    <a href="{{ route('client.login') }}">Đăng nhập</a>
</body>

</html>
