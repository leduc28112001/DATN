<?php
titlePage("Cửa hàng");
$db = include './config/database.php';
$categoryController = new Category_Controller($db);
$productController = new Product_Controller($db);
?>
<main>
    <div id="home">
        <?= $categoryController->showCategoriesAside() ?>
        <article>
            <?php include './component/fillter.php' ?>
            <?= $productController->fillterProductNav() ?>
        </article>
    </div>
</main>
<!-- /* ------------------------------- JAVASCRIPT ------------------------------- */ -->
<script src="./assets/javascript/filter-product.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* ------------------------------- JAVASCRIPT ------------------------------- */ -->