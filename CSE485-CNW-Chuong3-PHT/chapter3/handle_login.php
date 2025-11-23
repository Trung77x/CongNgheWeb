<?php
// TODO 1: Khởi động session
session_start();

// TODO 2: Kiểm tra xem người dùng đã gửi form chưa
if (isset($_POST['username']) && isset($_POST['password'])) {

    // TODO 3: Lấy dữ liệu từ POST
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // TODO 4: Kiểm tra đăng nhập
    if ($user == 'crazyboy' && $pass == '123') {

        // TODO 5: Lưu vào SESSION
        $_SESSION['user'] = $user;

        // TODO 6: Chuyển hướng sang welcome.php
        header('Location: welcome.php');
        exit;

    } else {
        // Sai thông tin → quay về login.html
        header('Location: login.html?error=1');
        exit;
    }

} else {

    // TODO 7: Nếu truy cập trực tiếp file này → đá về login.html
    header('Location: login.html');
    exit;
}
?>
