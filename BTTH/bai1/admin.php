<?php
session_start();

$imgDir = 'images/';

// DỮ LIỆU HOA - Lưu trực tiếp trong Session
if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [
        ['name' => 'Hoa Đỗ Quyên', 'description' => 'Hoa đỗ quyên nở rực rỡ với những chùm hoa dày và nổi bật. Trong phong thủy, đỗ quyên tượng trưng cho sự sum vầy, hạnh phúc và sự ấm áp của gia đình.', 'image' => 'doquyen.jpg'],
        ['name' => 'Hoa Hải Đường', 'description' => 'Hoa hải đường thanh nhã, thường có màu trắng, hồng hoặc kem. Đây là loài hoa biểu tượng cho sự giàu sang, phú quý và nét đẹp quý phái.', 'image' => 'haiduong.jpg'],
        ['name' => 'Hoa Mai', 'description' => 'Hoa mai vàng là biểu tượng đặc trưng của mùa xuân phương Nam. Mỗi bông mai nở mang ý nghĩa về sự may mắn, tài lộc, thịnh vượng và niềm vui mới.', 'image' => 'mai.jpg'],
        ['name' => 'Hoa Tường Vy', 'description' => 'Hoa tường vy có cánh nhỏ, mọc thành chùm xinh xắn và hương thơm dịu. Đây là loài hoa tượng trưng cho sự dịu dàng, tinh khôi và một tình yêu trong sáng.', 'image' => 'tuongvy.jpg']
    ];
}

$flowers = &$_SESSION['flowers'];

// XỬ LÝ THÊM/SỬA
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $idx = $_POST['idx'] ?? -1;
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $image = trim($_POST['current_image']);

    // Upload ảnh mới nếu có
    if (!empty($_FILES['image_file']['name'])) {
        $tmp = $_FILES['image_file']['tmp_name'];
        $newName = time() . '_' . basename($_FILES['image_file']['name']);
        if (!is_dir($imgDir)) mkdir($imgDir, 0755, true);
        if (move_uploaded_file($tmp, $imgDir . $newName)) {
            $image = $newName;
        }
    }

    // Thêm hoặc sửa
    if ($idx >= 0 && isset($_SESSION['flowers'][$idx])) {
        $_SESSION['flowers'][$idx] = ['name' => $name, 'description' => $description, 'image' => $image];
        $_SESSION['msg'] = 'Cập nhật thành công!';
    } else {
        $_SESSION['flowers'][] = ['name' => $name, 'description' => $description, 'image' => $image];
        $_SESSION['msg'] = 'Thêm mới thành công!';
    }
    
    header('Location: admin.php');
    exit;
}

// XỬ LÝ XÓA
if (isset($_GET['delete'])) {
    $idx = intval($_GET['delete']);
    if (isset($_SESSION['flowers'][$idx])) {
        // Xóa ảnh nếu có
        if (!empty($_SESSION['flowers'][$idx]['image']) && file_exists($imgDir . $_SESSION['flowers'][$idx]['image'])) {
            unlink($imgDir . $_SESSION['flowers'][$idx]['image']);
        }
        array_splice($_SESSION['flowers'], $idx, 1);
        $_SESSION['msg'] = 'Đã xóa!';
    }
    header('Location: admin.php');
    exit;
}

// Lấy dữ liệu để sửa
$editItem = null;
$editIdx = -1;
if (isset($_GET['edit'])) {
    $editIdx = intval($_GET['edit']);
    if (isset($_SESSION['flowers'][$editIdx])) {
        $editItem = $_SESSION['flowers'][$editIdx];
    }
}

// Cập nhật biến $flowers để hiển thị
$flowers = $_SESSION['flowers'];

$msg = $_SESSION['msg'] ?? '';
if ($msg) unset($_SESSION['msg']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị - Danh sách hoa</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .alert {
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 500;
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .back-link {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .back-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>
    <header class="site-header">
        <h1>🌸 Quản trị Danh sách Hoa 🌸</h1>
    </header>

    <main class="container">
        <a href="index.php" class="back-link">← Về trang chủ</a>

        <?php if ($msg): ?>
            <div class="alert"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <!-- Form thêm/sửa -->
        <section class="form-section">
            <h2><?= $editItem ? '✏️ Sửa thông tin hoa' : '➕ Thêm loại hoa mới' ?></h2>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="idx" value="<?= $editIdx ?>">
                <input type="hidden" name="current_image" value="<?= htmlspecialchars($editItem['image'] ?? '') ?>">

                <div class="form-row">
                    <label>Tên hoa:</label>
                    <input type="text" name="name" required value="<?= htmlspecialchars($editItem['name'] ?? '') ?>">
                </div>

                <div class="form-row">
                    <label>Mô tả:</label>
                    <textarea name="description" rows="4" required><?= htmlspecialchars($editItem['description'] ?? '') ?></textarea>
                </div>

                <div class="form-row">
                    <label>Ảnh hiện tại:</label>
                    <?php if (!empty($editItem['image'])): ?>
                        <div class="img-preview">
                            <img src="images/<?= htmlspecialchars($editItem['image']) ?>" alt="Preview">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-row">
                    <label>Chọn ảnh mới (nếu muốn thay đổi):</label>
                    <input type="file" name="image_file" accept="image/*">
                </div>

                <button type="submit" name="save">💾 Lưu lại</button>
                <?php if ($editItem): ?>
                    <a href="admin.php" class="action-btn" style="margin-left: 10px;">❌ Hủy</a>
                <?php endif; ?>
            </form>
        </section>

        <!-- Bảng danh sách -->
        <section class="table-section">
            <h2>📋 Danh sách các loại hoa</h2>
            <table id="flowers-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên hoa</th>
                        <th>Mô tả</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($flowers)): ?>
                        <tr><td colspan="5" style="text-align:center;">Chưa có dữ liệu</td></tr>
                    <?php else: ?>
                        <?php foreach ($flowers as $i => $f): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= htmlspecialchars($f['name']) ?></td>
                                <td><?= htmlspecialchars(substr($f['description'], 0, 80)) ?>...</td>
                                <td>
                                    <?php if (!empty($f['image'])): ?>
                                        <img src="images/<?= htmlspecialchars($f['image']) ?>" alt="" style="width:60px;height:40px;object-fit:cover;border-radius:5px;">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="admin.php?edit=<?= $i ?>" class="action-btn">✏️ Sửa</a>
                                    <a href="admin.php?delete=<?= $i ?>" class="action-btn delete" onclick="return confirm('Xác nhận xóa?')">🗑️ Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer class="site-footer">
        <small>© 2025 - Hệ thống quản lý hoa trang trí</small>
    </footer>
</body>
</html>