<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 02 - phan 1</title>
  <link href="style.css" rel="stylesheet">
  <!-- Link CSS của Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">BKSTORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <!-- Thanh tìm kiếm -->
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<div class="wrapper">
  <div class="section section-left">
    
    <div class="flex-box">
      <h2>Category</h2>
    </div>
      <!-- Thay đổi nội dung PHP để hiển thị danh sách sản phẩm -->
      <?php
      require_once "databaseconnect.php";
      $stmt = $conn->query("SELECT * FROM products");
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='flex-item'><a href='detail.php?id={$row['id']}'>{$row['name']}</a></div>";
      }
      ?>
    <div class="flex-box">
      <h2>Category</h2>
    </div>
      <!-- Thay đổi nội dung PHP để hiển thị danh sách sản phẩm -->
      <?php
      $stmt = $conn->query("SELECT * FROM products");
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='flex-item'><a href='detail.php?id={$row['id']}'>{$row['name']}</a></div>";
      }
      ?>  
  </div>
  <div class="section section-large">
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
                         
                    echo "<div class='card'>";
                    echo "<div class='product-info'>";
                    echo "<h1 class='product-name'>{$product['name']}</h1>";
                    echo "<p class='product-price'>Price: {$product['price']}</p>";
                    echo "<p class='product-description'>{$product['description']}</p>";
                    echo "<button class='btn btn-primary'>Buy now</button>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p class='error'>Không tìm thấy sản phẩm.</p>";
                }
            } else {
                echo "<p class='error'>Không có ID sản phẩm được cung cấp.</p>";
            }
            ?>
        </div> <!-- product-detail -->
        </div>
       
  </div>
  <div class="section section-right">

  </div>
  
</div>  
<footer class="bg-light py-4">
  <div class="container">
    <p class="text-center">Footer information ...</p> 
    <div class="row">
      <div class="col">
        <ul class="list-unstyled d-flex justify-content-center">
          <li class="mx-2"><a href="#">Link 1</a></li>
          <li><span>|</span></li>
          <li class="mx-2"><a href="#">Link 2</a></li>
          <li><span>|</span></li>
          <li class="mx-2"><a href="#">Link 3</a></li>
        </ul>
      </div>
    </div>
    
  </div>
</footer>
</body>
</html>

