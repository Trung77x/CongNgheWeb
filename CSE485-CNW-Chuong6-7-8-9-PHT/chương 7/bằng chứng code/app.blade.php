<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Website Của Tôi' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        header, footer {
            background: #f2f2f2;
            padding: 15px;
            text-align: center;
        }
        nav {
            background: #333;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Trang Web CSE485 - Chương 7</h1>
</header>

<nav>
    <a href="/">Trang Chủ</a>
    <a href="/about">Giới Thiệu</a>
</nav>

<div class="container">
    @yield('content')
</div>

<footer>
    <p>&copy; 2025 - Khoa CNTT - Trường Đại học Thủy Lợi</p>
</footer>

</body>
</html>
