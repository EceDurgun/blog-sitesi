<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Benim Blog Sitem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a.logo {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }
        .navbar .nav-links a {
            text-decoration: none;
            padding: 6px 12px;
            font-size: 13px;
            color: #fff;
            border-radius: 3px;
            margin-left: 5px;
        }
        .btn-add { background-color: #5cb85c; }
        .btn-logout { background-color: #d9534f; }
        .btn-login { background-color: #337ab7; }

        .container {
            max-width: 700px;
            margin: 30px auto;
            padding: 0 15px;
        }
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 3px;
            font-size: 14px;
        }
        .alert-info {
            background-color: #d9edf7;
            color: #31708f;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #bce8f1;
            border-radius: 3px;
            font-size: 14px;
        }
        .post {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 16px;
            margin-bottom: 20px;
        }
        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .post-header h3 {
            margin: 0;
            font-size: 18px;
            color: #222;
        }
        .btn-delete {
            background-color: #d9534f;
            color: white;
            text-decoration: none;
            padding: 4px 8px;
            font-size: 12px;
            border-radius: 3px;
        }
        .post-date {
            font-size: 12px;
            color: #777;
            margin: 6px 0 12px 0;
        }
        .post-content {
            font-size: 14px;
            line-height: 1.5;
            color: #333;
            white-space: pre-wrap;
            margin-bottom: 12px;
        }
        .actions {
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        .actions a {
            text-decoration: none;
            font-size: 13px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #333;
            background: #fafafa;
            margin-right: 5px;
            display: inline-block;
        }
        .actions a:hover {
            background: #eee;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="/" class="logo">Blog Projesi</a>
    <div class="nav-links">
        @if(session('is_admin'))
            <a href="/makale-ekle" class="btn-add">Makale Ekle</a>
            <a href="/logout" class="btn-logout">Çıkış</a>
        @else
            <a href="/login" class="btn-login">Giriş</a>
        @endif
    </div>
</div>

<div class="container">
    <h2>Son Makaleler</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($makaleler->isEmpty())
        <div class="alert-info">
            Henüz hiç makale paylaşılmamış.
        </div>
    @endif

    @foreach($makaleler as $makale)
        <div class="post">
            <div class="post-header">
                <h3>{{ $makale->title }}</h3>
                @if(session('is_admin'))
                    <a href="/makale-sil/{{ $makale->id }}" class="btn-delete" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a>
                @endif
            </div>

            <div class="post-date">
                Tarih: {{ $makale->created_at->format('d.m.Y H:i') }}
            </div>

            <div class="post-content">{{ $makale->content }}</div>

            <div class="actions">
                <a href="/makale-like/{{ $makale->id }}">Beğen ({{ $makale->likes }})</a>
                <a href="/makale-dislike/{{ $makale->id }}">Beğenme ({{ $makale->dislikes }})</a>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>