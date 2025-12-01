<?php

// ======== IMPORT MODEL ========
require_once 'models/SinhVienModel.php';

// ======== KẾT NỐI PDO ========
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}


// ======== XỬ LÝ THÊM SINH VIÊN ========
if (isset($_POST['ten_sinh_vien']) && isset($_POST['email'])) {
    $ten = $_POST['ten_sinh_vien'];
    $email = $_POST['email'];

    addSinhVien($pdo, $ten, $email);

    header("Location: index.php");
    exit;
}

// ======== LẤY DANH SÁCH SINH VIÊN ========
$danh_sach_sv = getAllSinhVien($pdo);

// ======== GỌI VIEW ========
include 'views/sinhvien_view.php';

?>
