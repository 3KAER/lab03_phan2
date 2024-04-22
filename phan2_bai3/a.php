<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Định dạng cho nút "Add product" */
        .add-product-link {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Danh sách sản phẩm</h2>
    <div class="row">
        <div class="col">
            <a href="b.php" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include file kết nối đến cơ sở dữ liệu
                    require_once "databaseconnect.php";

                    // Truy vấn dữ liệu từ bảng products
                    $query = "SELECT * FROM products";
                    $result = $conn->query($query);

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>"; // Thêm cột mô tả
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>
                                <a href='c.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
                                <a href='d.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
