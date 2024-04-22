<?php
// Kết nối đến CSDL
require_once "databaseconnect.php";

// Truy vấn để lấy thông tin sản phẩm
$stmt = $conn->query("SELECT * FROM products");

// Hiển thị danh sách sản phẩm
echo "<h1>Danh sách sản phẩm</h1>";
echo "<ul>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li><a href='detail.php?id={$row['id']}'>{$row['name']}</a></li>";
}
echo "</ul>";
?>
