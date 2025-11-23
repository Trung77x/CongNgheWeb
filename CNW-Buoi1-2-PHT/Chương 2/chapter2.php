<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 2 - PHP Căn Bản</title>
</head>
<body>

<h1>Kết quả PHP Căn Bản</h1>

<?php 
// BẮT ĐẦU CODE PHP CỦA BẠN

// TODO 1: Khai báo 3 biến
$ho_ten = "Hồ Sỹ Trung"; 
$diem_tb = 8.7;              
$co_di_hoc_chuyen_can = true;

// TODO 2: In ra thông tin
echo "Họ tên: $ho_ten <br>";
echo "Điểm trung bình: $diem_tb <br>";
echo "Chuyên cần: " . ($co_di_hoc_chuyen_can ? "Có" : "Không") . "<br><br>";

// TODO 3: IF / ELSE IF / ELSE
if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true) {
    echo "Xếp loại: Giỏi <br>";
}
else if ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true) {
    echo "Xếp loại: Khá <br>";
}
else if ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can == true) {
    echo "Xếp loại: Trung bình <br>";
}
else {
    echo "Xếp loại: Yếu (Cần cố gắng thêm!) <br>";
}

echo "<br>";

// TODO 4: Viết hàm đơn giản
function chaoMung() {
    echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!<br>";
}

// TODO 5: Gọi hàm
chaoMung();

// KẾT THÚC CODE PHP CỦA BẠN
?> 

</body>
</html>
