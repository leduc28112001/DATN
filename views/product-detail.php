<main>
    <article>
    <div id="product-details">
        <div class="image-pdts">
            <div class="image-main-pdts">
                <img id="imageMain" src="./assets/image/<?= $product['image'] ?>" alt="">
            </div>
        </div>
        <div class="information-pdts">
            <div class="infor-top">
                <div class="title-pdts">
                    <?= $product['productName'] ?>
                </div>
                <div class="quantity-sold-commment-pdts">
                    <span style="color: #F1C93B;"> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                    | <span>
                        <?php
                        $db = include './config/database.php';
                        $commentController = new Comment_Controller($db);
                        echo $commentController->quantityComment();
                        ?>
                        đánh giá
                    </span>
                    | <span>978 số lượt thích</span>
                </div>
                <!-- /* ------------------------------ SIZE + COLOR ------------------------------ */ -->
                <div class="selectCLS">
                    <div id="productColor">
                        Màu: 
                        <?php 
                        if(!is_null($colors)){
                            $indexColor = 1;
                            foreach($colors as $color){
                                ?>
                                <label for="color<?= $indexColor ?>"><?= $color['colorName'] ?></label>
                                <!-- /* ----------------------------------- FIX ---------------------------------- */ -->
                                <div class="allColorProduct" style="padding-top:0px;">
                                    <?php
                                        $colorName = $color['colorName']; 
                                        $background= "";
                                        if($colorName == 'đen'){ // đen
                                            $styleColor = "black";
                                        }elseif($colorName == 'kem'){ // kem
                                            $styleColor = "#eeeadb";
                                        }elseif($colorName == 'nâu'){ // nâu
                                            $styleColor = "#b27c58";
                                        }elseif($colorName == 'xám'){ // xám
                                            $styleColor = "gray";
                                        }elseif($colorName == 'hồng'){ // hồng
                                            $styleColor = "pink";
                                        }elseif($colorName == 'cam'){ // cam
                                            $styleColor = "orangered";
                                        }elseif($colorName == 'xanh lá'){ // xanh lá
                                            $styleColor = "green";
                                        }elseif($colorName == 'xanh dương'){ // xanh dương
                                            $styleColor = "blue";
                                        }elseif($colorName == 'trắng hồng'){ // trắng hồng
                                            $background = "linear-gradient(to right, white 50%, pink 50%);";
                                        }elseif($colorName == 'trắng xám'){ // trắng xám
                                            $background = "linear-gradient(to right, white 50%, gray 50%);";
                                        }elseif($colorName == 'trắng xanh lá'){ // trắng xanh lá
                                            $background = "linear-gradient(to right, white 50%, green 50%);";
                                        }elseif($colorName == 'trắng xanh biển'){ // trắng xanh biển
                                            $background = "linear-gradient(to right, white 50%, blue 50%);";
                                        }elseif($colorName == 'đen cam'){ // đen cam
                                            $background = "linear-gradient(to right, black 50%, orangered 50%);";
                                        }elseif($colorName == 'đen hồng'){ // đen hồng
                                            $background = "linear-gradient(to right, black 50%, pink 50%);";
                                        }elseif($colorName == 'kem đen'){ // kem đen
                                            $background = "linear-gradient(to right, #eeeadb 50%, black 50%);";
                                        }elseif($colorName == 'kem nâu'){ // kem nầu
                                            $background = "linear-gradient(to right, #eeeadb 50%, brown 50%);";
                                        }elseif($colorName == 'đen trắng'){ // đen trắng
                                            $background = "linear-gradient(to right, black 50%, white 50%);";
                                        }elseif($colorName == 'đen xám'){ // đen xám
                                            $background = "linear-gradient(to right, black 50%, gray 50%);";
                                        }else{
                                            $styleColor = "white";
                                        }
                                        ?><div class="color" style="background-color:<?= $styleColor ?>; background: <?= $background ?>"></div><?php //HTML
                                    ?>
                                </div>
                                <!-- /* ----------------------------------- FIX ---------------------------------- */ -->
                            <input style="display:none;" id="color<?= $indexColor ?>" type="radio" name="color" value="./assets/image/<?= $color['colorImage'] ?>" data-color="<?= $color['colorId'] ?>">
                            <?php //HTML
                            $indexColor++;
                            }
                        }
                        ?>
                    </div>
                    <div id="productSize">
                        Kích thước:
                        <?php 
                            if(!is_null($sizes)){
                            $indexSize = 1;
                            foreach($sizes as $size){
                                ?>
                                <label for="size<?= $indexSize ?>"><?= $size['sizeName'] ?></label>
                                <input id="size<?= $indexSize ?>" type="radio" name="size" value="<?= $size['sizeId'] ?>">
                                <?php //HTML
                                $indexSize++;
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- /* ------------------------------ SIZE + COLOR ------------------------------ */ -->
                <div class="quantity-sold-commment-pdts keclass" id="calculate-size">Hướng dẫn tính size</div>
                <div class="price-pdts">
                    <?php 
                    if($product['discount'] > 0){
                        ?><span class="cost-pdts">$<?= $product['price'] ?> </span><?php //HTML
                    }
                    ?>
                    <span class="price-pdts-end">
                        <?php 
                            $price = $product['price'] - ($product['price'] * $product['discount'] / 100);
                            ?><span><?= number_format($price) ?> VNĐ</span><?php //HTML
                        ?>
                    </span>
                </div>
                <!-- /* ------------------------------- ADD TO CART ------------------------------ */ -->
                <?php 
                    $db = require './config/database.php';
                    $productController = new Product_Controller($db);
                    $quantityOld = $productController->quantityOld($product['id']);
                    $quantity = $product['quantity'];
                    if($quantityOld !== $quantity){ // Kiểm tra xem hàng trong kho đã bán hết chưa
                        ?>
                        <form action="" method="POST" onsubmit="return false">
                            <!-- /* -------------------------- SỐ LƯỢNG HÀNG TỒN KHO ------------------------- */ -->
                            <input hidden type="number" readonly id="max-qtt" value="<?= $quantity - $quantityOld ?>">
                            <!-- /* -------------------------- SỐ LƯỢNG HÀNG TỒN KHO ------------------------- */ -->
                            <!-- /* -------------------------- SỐ LƯỢNG MAX BÊN CART ------------------------- */ -->
                            <input hidden type="number" readonly id="max-qtt-on-cart" value="<?= $quantityOnCart ?>">
                            <!-- /* -------------------------- SỐ LƯỢNG MAX BÊN CART ------------------------- */ -->
                            <div class="control-quantity">
                                <input type="hidden" id="productId" value="<?= (isset($_GET["id"])) ? $_GET["id"] : "" ?>">
                                <button type="button" id="down-qtt"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" value="1" id="quantity_add_cart">
                                <button type="button" id="up-qtt"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <?php 
                            if(isset($_SESSION["user"])){
                                ?>
                                <button type="submit" id="buy-now" class="button-action-pdt">Mua ngay</button>
                                <button type="submit" id="add-to-cart" class="button-action-pdt">Thêm vào giỏ hàng</button>
                                <?php //HTML
                            }else{
                                ?>
                                <button type="submit" id="buy-now-nologin" class="button-action-pdt">Mua ngay</button>
                                <button type="submit" id="add-to-cart-nologin" class="button-action-pdt">Thêm vào giỏ hàng</button>
                                <?php //HTML
                            }
                            ?>
                        </form>
                        <?php // HTML
                    }
                ?>
                <!-- /* ------------------------------- ADD TO CART ------------------------------ */ -->
            </div>
            <div class="sub-image-pdts">
                <?php 
                $productController = new Product_Controller($db);
                $images = $productController->showListImageWeb();
                if(!is_null($images)){
                    $idDOM = 1;
                    $totalIdDOM = 0;
                    foreach($images as $image){
                        $number = $idDOM++;
                        ?>
                        <div class="box-subimage">
                            <img id="nextImageMore<?= $number ?>" onmouseover="nextImage(<?= $number ?>)" src="./assets/image/<?= $image['image'] ?>" alt="">
                        </div>
                        <?php // HTML
                        $totalIdDOM++;
                    }
                }
                ?>
                <!-- SỐ LƯỢNG ẢNH -->
                <input type="hidden" value="<?= $totalIdDOM ?>" id="quantitySubImage">
                <!-- SỐ LƯỢNG ẢNH -->
            </div>
        </div>
    </div>
    <div class="infor-more">
        <div class="detais-description-pdts">
            <div class="title-details-description-pdts">
                Mô tả sản phẩm: <?= $product['productName'] ?>
            </div>
            <div class="content-details-description-pdts">
                <?= $product['description'] ?>
            </div>
            <div class="title-details-description-pdts">
                Chi tiết sản phẩm
            </div>
            <div class="content-details-description-pdts">
                <?= $product['details'] ?>
            </div>
            <!-- /* ------------------------------- ALL PRODUCT ------------------------------ */ -->
            <?php 
            $commentController = new Comment_Controller($db);
            $productController = new Product_Controller($db);
            $commentController->showListCommentForProduct();
            $productController->showProductListByCategory($product['categoryId']);
            ?>
            <!-- /* ------------------------------- ALL PRODUCT ------------------------------ */ -->
        </div>
        <!-- /* ---------------------------------- PROMOTIONS --------------------------------- */ -->
        <div class="all-discounts">
            <?php 
            include './models/promotion-model.php';
            include './controllers/promotion-controller.php';
            $promotionController = new Promotion_Controller($db);
            echo $promotionController->showPromotionListWeb();
            ?>
        </div>
        <!-- /* ---------------------------------- PROMOTIONS --------------------------------- */ -->
    </div>
    </article>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/comment.js"></script>
<script src="./assets/javascript/delete-comment.js"></script>
<script src="./assets/javascript/add-to-cart.js"></script>
<script src="./assets/javascript/add-to-cart-nologin.js"></script>
<script src="./assets/javascript/quantity-actions.js"></script>
<script src="./assets/javascript/product-detail.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
