<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Giriş</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin-top: 100px;
        }
        .login-box {
            width: 320px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            width: 100%;
            padding: 9px;
            background-color: #337ab7;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #286090;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ebccd1;
            border-radius: 3px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h3 style="text-align: center; margin-top: 0;">Yönetici Girişi</h3>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label>Kullanıcı Adı:</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Şifre:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Giriş</button>
    </form>
</div>

</body>
</html>