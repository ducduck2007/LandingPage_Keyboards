<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body>
    <h1>Đặt lại mật khẩu</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('client.password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password mới:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Nhập lại Password:</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">Đặt lại mật khẩu</button>
    </form>
    <a href="{{ route('client.login') }}">Đăng nhập</a>
</body>

</html>
