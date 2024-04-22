<?php
// Include file kết nối đến cơ sở dữ liệu
require_once "databaseconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        // Xử lý tệp hình ảnh được tải lên

        // Thực hiện truy vấn thêm dữ liệu vào bảng products
        $query = "INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $description, $price, $image]);

        echo "<script>alert('Thêm sản phẩm thành công!');</script>";
    } catch (PDOException $e) {
        // Xử lý lỗi
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>

<body>
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Mô tả sản phẩm:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh sản phẩm:</label>
                <input type="text" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>
