<?php
// Thông tin kết nối CSDL
$servername = "localhost";
$username = "root"; // Thay username bằng tên người dùng CSDL của bạn
$password = ""; // Thay password bằng mật khẩu CSDL của bạn
$dbname = "shop"; // Thay ten_cua_csdn bằng tên CSDL của bạn

try {
    // Tạo kết nối đến CSDL bằng PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi để báo lỗi nếu có
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Nếu có lỗi, in ra thông báo lỗi
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
}
?>
