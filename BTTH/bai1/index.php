<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>🌸 Danh sách các loại hoa đẹp</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .empty-state {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }
    .empty-state a {
      display: inline-block;
      margin-top: 15px;
      padding: 12px 30px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      text-decoration: none;
      border-radius: 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
    .empty-state a:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }
  </style>
</head>
<body>
  <header class="site-header">
    <h1>🌸 14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè 🌸</h1>
    <nav><a href="admin.php">⚙️ Quản trị</a></nav>
  </header>

  <main class="container">
    <div class="card-grid">
      <?php
      session_start();
      
      // Khởi tạo dữ liệu mẫu nếu chưa có
      if (!isset($_SESSION['flowers'])) {
          $_SESSION['flowers'] = [
              ['name' => 'Hoa Đỗ Quyên', 'description' => 'Hoa đỗ quyên nở rực rỡ với những chùm hoa dày và nổi bật. Trong phong thủy, đỗ quyên tượng trưng cho sự sum vầy, hạnh phúc và sự ấm áp của gia đình.', 'image' => 'doquyen.jpg'],
              ['name' => 'Hoa Hải Đường', 'description' => 'Hoa hải đường thanh nhã, thường có màu trắng, hồng hoặc kem. Đây là loài hoa biểu tượng cho sự giàu sang, phú quý và nét đẹp quý phái.', 'image' => 'haiduong.jpg'],
              ['name' => 'Hoa Mai', 'description' => 'Hoa mai vàng là biểu tượng đặc trưng của mùa xuân phương Nam. Mỗi bông mai nở mang ý nghĩa về sự may mắn, tài lộc, thịnh vượng và niềm vui mới.', 'image' => 'mai.jpg'],
              ['name' => 'Hoa Tường Vy', 'description' => 'Hoa tường vy có cánh nhỏ, mọc thành chùm xinh xắn và hương thơm dịu. Đây là loài hoa tượng trưng cho sự dịu dàng, tinh khôi và một tình yêu trong sáng.', 'image' => 'tuongvy.jpg']
          ];
      }
      
      if (isset($_SESSION['flowers']) && !empty($_SESSION['flowers'])) {
          foreach ($_SESSION['flowers'] as $f) {
              echo '<article class="card">';
              if (!empty($f['image'])) {
                  echo '<img class="thumb" src="images/' . htmlspecialchars($f['image']) . '" alt="' . htmlspecialchars($f['name']) . '">';
              }
              echo '<div class="content">';
              echo '<h3>' . htmlspecialchars($f['name']) . '</h3>';
              echo '<p>' . htmlspecialchars($f['description']) . '</p>';
              echo '</div>';
              echo '</article>';
          }
      } else {
          echo '<div class="empty-state" style="grid-column: 1/-1;">';
          echo '<h2>📭 Chưa có dữ liệu hoa nào</h2>';
          echo '<p>Vui lòng thêm các loại hoa tại trang quản trị</p>';
          echo '<a href="admin.php">➕ Đi đến trang quản trị</a>';
          echo '</div>';
      }
      ?>
    </div>
  </main>

  <footer class="site-footer">
    <small>💾 Dữ liệu lưu trong PHP Session | © 2025 Hệ thống quản lý hoa trang trí</small>
  </footer>
</body>
</html>