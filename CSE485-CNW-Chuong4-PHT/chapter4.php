<?php
require 'db.php';

$sql = "SELECT * FROM sinhvien ORDER BY ngay_tao DESC";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên - PDO</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        input { margin-right: 10px; padding: 5px; }
        button { padding: 6px 12px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Thêm Sinh viên</h2>

    <form action="add.php" method="POST">
        <input type="text" name="ten_sinh_vien" placeholder="Tên sinh viên" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Thêm</button>
    </form>

    <h2>Danh sách sinh viên</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>

        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['ten_sinh_vien']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['ngay_tao']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
