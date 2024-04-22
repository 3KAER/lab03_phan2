<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết sản phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">BKSTORE</h1>
        </div>
    </header>

    <div class="container">
        <div class="product-detail">
            <?php
            require_once "databaseconnect.php";
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                if($product) {
                    echo "<div class='product-image'>";
                    echo "<img src='{$product['image']}' alt='{$product['name']}'>";
                    echo "</div>";
                    echo "<div class='product-info'>";
                    echo "<h1 class='product-name'>{$product['name']}</h1>";
                    echo "<p class='product-price'>Price: {$product['price']}</p>";
                    echo "<p class='product-description'>{$product['description']}</p>";
                    echo "<button class='btn btn-primary'>Add to Cart</button>";
                    echo "</div>";
                } else {
                    echo "<p class='error'>Không tìm thấy sản phẩm.</p>";
                }
            } else {
                echo "<p class='error'>Không có ID sản phẩm được cung cấp.</p>";
            }
            ?>
        </div> <!-- product-detail -->
    </div> <!-- container -->

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Apple Inc. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
