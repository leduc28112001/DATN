<?php
$db = include './config/database.php';
$categoryController = new Category_Controller($db);
$productController = new Product_Controller($db);
$bannerController = new Banner_Controller($db);
?>
<main>
    <article>
        <?= $bannerController->showBannerListWeb() ?>
        <?= $productController->showProductByStatusLimit("SẢN PHẨM BÁN CHẠY",'hot', 10) ?>
        <div class="view-more"><button onclick="window.location.href = '?page=shop'">Xem tất cả</button></div>
        <?= $productController->showProductByStatusLimit("SẢN PHẨM MỚI NHẤT",'new', 10) ?>
        <div class="view-more"><button onclick="window.location.href = '?page=shop'">Xem tất cả</button></div>
        <?= $productController->showProductByStatusLimit("GIẢM GIÁ",'sale', 10) ?>
        <div class="view-more"><button onclick="window.location.href = '?page=shop'">Xem tất cả</button></div>
        <?= $productController->showProductByStatusLimit("GỢI Ý CHO BẠN",'hot', 10) ?>
        <div class="view-more"><button onclick="window.location.href = '?page=shop'">Xem tất cả</button></div>
    </article>
</main>
<!-- /* ------------------------------- JAVASCRIPT ------------------------------- */ -->
<script src="./assets/javascript/filter-product.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* ------------------------------- JAVASCRIPT ------------------------------- */ -->