<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title>

    <style>
        body { font-family: Arial; padding: 20px; }
        input { margin-right: 10px; padding: 6px; }
        button { padding: 6px 10px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>

<body>

    <h2>Thêm Sinh viên (Kiến trúc MVC)</h2>

    <form action="index.php" method="POST">
        <input type="text" name="ten_sinh_vien" placeholder="Tên sinh viên" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Thêm</button>
    </form>

    <h2>Danh sách sinh viên (Kiến trúc MVC)</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>

        <?php foreach ($danh_sach_sv as $sv): ?>
            <tr>
                <td><?= htmlspecialchars($sv['id']) ?></td>
                <td><?= htmlspecialchars($sv['ten_sinh_vien']) ?></td>
                <td><?= htmlspecialchars($sv['email']) ?></td>
                <td><?= htmlspecialchars($sv['ngay_tao']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
