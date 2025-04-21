<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Ofel Kitchen</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('assets/img/login.png') }}');
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .register-form {
            background-color: #fff;
            padding: 35px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 90px;
            height: auto;
        }

        h2 {
            text-align: center;
            color:rgb(28, 31, 37);
            margin-bottom: 25px;
            font-size: 24px;
        }

        form > div {
            margin-bottom: 18px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #294a7b;
            outline: none;
            box-shadow: 0 0 0 2px rgba(41, 74, 123, 0.2);
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1e3862;
        }

        .error {
            color: red;
            font-size: 0.85em;
            margin-top: 4px;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        a {
            color: #294a7b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .message-container {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success.message-container {
            background-color: #d4edda;
            color: #155724;
        }

        .error.message-container {
            background-color: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 480px) {
            .register-form {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="register-form">
        {{-- Logo --}}
        <div class="logo">
            <img src="{{ asset('assets/img/ofelkitchen.png') }}" alt="Logo">
        </div>

        {{-- Flash Message --}}
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

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <h2>Daftar Akun</h2>

            <div>
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="phone">Nomor Telepon (Opsional)</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit">Daftar</button>
        </form>

        <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>

</body>
</html>
