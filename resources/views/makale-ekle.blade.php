<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Makale Ekle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            max-width: 680px;
            margin: 40px auto;
            padding: 0 15px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .top-bar a {
            text-decoration: none;
            padding: 6px 12px;
            font-size: 13px;
            color: #fff;
            border-radius: 3px;
            margin-left: 5px;
        }
        .btn-home {
            background-color: #6c757d;
        }
        .btn-logout {
            background-color: #d9534f;
        }
        .box {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-family: inherit;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 14px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 3px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <h3 style="margin: 0;">Yeni Makale Ekle</h3>
    <div>
        <a href="/" class="btn-home">Anasayfa</a>
        <a href="/logout" class="btn-logout">Çıkış Yap</a>
    </div>
</div>

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<div class="box">
    <form action="/makale-ekle" method="POST">
        @csrf
        <div class="form-group">
            <label>Makale Başlığı:</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>İçerik:</label>
            <textarea name="content" rows="7" required></textarea>
        </div>

        <button type="submit">Yayınla</button>
    </form>
</div>

</body>
</html>