<?php
// Kết nối đến CSDL
require_once "databaseconnect.php";

// Kiểm tra xem có tham số id được truyền từ URL không
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Truy vấn để lấy thông tin sản phẩm
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Hiển thị thông tin sản phẩm
    if($product) {
        echo "<h1>Thông tin chi tiết sản phẩm</h1>";
        echo "<p>ID: {$product['id']}</p>";
        echo "<p>Tên: {$product['name']}</p>";
        echo "<p>Mô tả: {$product['description']}</p>";
        echo "<p>Giá: {$product['price']}</p>";
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "Không có ID sản phẩm được cung cấp.";
}
?>
