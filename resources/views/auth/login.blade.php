<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ofel Kitchen</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('assets/img/') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(255, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 150px;
            height: auto;
        }

        h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #b30000;
        }

        .message-container {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            font-size: 0.9em;
        }

        .success.message-container {
            background-color: #ffe6e6;
            color: #660000;
            border: 1px solid #ff9999;
        }

        .error.message-container {
            background-color: #ffe6e6;
            color: #b30000;
            border: 1px solid #ff4d4d;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #b30000;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid #ffcccc;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #fffafa;
        }

        input[type="checkbox"] {
            margin-right: 10px;
            accent-color: #ff4d4d;
        }

        .remember-container {
            margin-top: 10px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #ff4d4d;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #cc0000;
        }

        p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #b30000;
        }

        .register-link {
            color: #ff4d4d;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link:hover {
            text-decoration: underline;
            color: #cc0000;
        }
    </style>
</head>
<body>

    <div class="login-form">
        <!-- Logo Container -->
        <div class="logo-container">
            <img src="{{ asset('assets/img/ofelkitchen.png') }}" alt="Logo">
        </div>

        <h2>Login</h2>

        @if (session('success'))
            <div class="success message-container">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="error message-container">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-container">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat Saya</label>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            <p>Belum punya akun? <a class="register-link" href="{{ route('register') }}">Daftar di sini</a></p>
        </form>
    </div>

</body>
</html>
