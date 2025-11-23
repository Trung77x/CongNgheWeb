<?php
// TODO 1: Khởi động session
session_start();

// TODO 2: Kiểm tra session có tồn tại không
if (isset($_SESSION['user'])) {

    // TODO 3: Lấy username từ SESSION
    $loggedInUser = $_SESSION['user'];

    // TODO 4: In ra lời chào
    echo "<h1>Chào mừng trở lại, $loggedInUser!</h1>";
    echo "<p>Bạn đã đăng nhập thành công.</p>";

    // TODO 5: Link đăng xuất tạm thời
    echo '<a href="login.html">Đăng xuất (Tạm thời)</a>';

} else {

    // TODO 6: Chưa đăng nhập → quay về login.html
    header('Location: login.html');
    exit;
}
?>
