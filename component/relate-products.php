<div class="product-container">
    <h3>Sản phẩm liên quan</h3>
    <div id="product-list">
        <?php
        if(isset($products)){
            foreach ($products as $product) :
            ?>
                <div class="product" data-filter="<?= $product['status'] ?>">
                    <a href="?page=details&id=<?= $product['id'] ?>">
                        <div class="product-image">
                            <img width="200px" src="./assets/image/<?= $product['image'] ?>" alt="">
                        </div>
                        <div class="information-product">
                            <div class="title"><?= $product['productName'] ?></div>
                            <div class="price">
                                <?php 
                                if($product['discount'] > 0){
                                    ?><del><?= $product['price'] ?> VNĐ</del><?php //HTML
                                    $price = $product['price'] - ($product['price'] * $product['discount'] / 100);
                                    ?><span><?= number_format($price) ?> VNĐ</span><?php //HTML
                                }else{
                                    ?>
                                    <span><?= number_format($product['price']) ?>VNĐ</span>
                                    <?php //HTML
                                }
                                ?>
                            </div>
                            <!-- /* ----------------------------------- FIX ---------------------------------- */ -->
                            <div class="allColorProduct">
                                <?php 
                                $db = require './config/database.php';
                                $newController = new Product_Model($db);
                                $productColors = $newController->showListColorById($product['id']);
                                foreach ($productColors as $productColor) :
                                    $colorName = $productColor['colorName'];
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
                                    ?>
                                    <div class="aColor" style="background-color:<?= $styleColor ?> ; background: <?= $background ?>"></div>
                                    <?php //HTML
                                endforeach;
                                ?>
                            </div>
                            <!-- /* ----------------------------------- FIX ---------------------------------- */ -->
                        </div>
                    </a>
                </div>
            <?php // HTML
            endforeach;
        }else{
            // require_once '../component/functionsHTML.php';
            messRed("Chưa có sản phẩm !!!");
        }
        ?>
    </div>
</div>
