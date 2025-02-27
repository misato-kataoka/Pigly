<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/step1.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>PiGLy</h1>
            <h2>ログイン</h2>
            <form action="#" method="POST">
                @csrf

                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="メールアドレスを入力">
                    <p class="login__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                    </p>

                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="パスワードを入力">
                    <p class="login__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                    </p>

                <button type="submit">ログイン</button>
            </form>
            <p><a href="/register/step1">アカウント作成はこちら</a></p>
        </div>
    </div>
</body>
</html>