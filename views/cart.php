<?= titlePage("Giỏ hàng") ?>
<main>
    <article>
    <?php 
    include './config/database.php';
    $productController = new Product_Controller($db);
    if(isset($result)){
        ?>
        <div id="cart">
            <div class="main-cart">
                <div class="all-cart">
                    <h1>Giỏ hàng của bạn</h1>
                    <table id="all-cart">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>.</th>
                        </tr>
                        <?php 
                        //Tổng tiền
                        $total = 0;
                        //Tổng tiền
                        foreach ($result as $cart):
                            ?>
                            <tr class="aCartItem">
                                <input type="hidden" id="productId" value="<?= $cart['productId'] ?>">
                                <td class="infc-product">
                                    <img src="./assets/image/<?= $cart['image'] ?>" width="100px" alt="">
                                    <span data-product-id="<?= $cart['productId'] ?>" onclick="redirectToProduct(this)">Màu <?= $cart['color'] ?> - Size <?= $cart['size'] ?> - <?= $cart['productName'] ?></span>
                                </td>
                                <!-- /* ----------------------------------- fix ---------------------------------- */ -->
                                <?php 
                                if ($cart['discount'] > 0) {
                                    // Xử lý khi có giảm giá
                                    $discount_amount = $cart['price'] * ($cart['discount'] / 100); // Tính số tiền giảm giá dựa trên phần trăm
                                    $price = $cart['price'] - $discount_amount; // Giá sau khi áp dụng giảm giá
                                } else {
                                    $price = $cart['price'];
                                }
                                ?>
                                <!-- /* ----------------------------------- fix ---------------------------------- */ -->
                                <td><?= number_format($price) ?> VNĐ</td>
                                <td>
                                    <!-- /* -------------------------- SỐ LƯỢNG HÀNG TỒN KHO ------------------------- */ -->
                                    <?php 
                                        $db = require './config/database.php';
                                        $productController = new Product_Controller($db);
                                        $quantityOld = $productController->quantityOld($cart['productId']);
                                        $maxQuantity = $cart['quantityPrd'] - $quantityOld;
                                    ?>
                                    <input type="hidden" id="max-qtt" value="<?= $maxQuantity ?>">
                                    <!-- /* -------------------------- SỐ LƯỢNG HÀNG TỒN KHO ------------------------- */ -->
                                    <div class="control-quantity" id="ctrQttCart">
                                        <button type="button" class="down-qtt-cart"><i class="fa-solid fa-minus"></i></button>
                                        <input type="number" min="1" value="<?= $cart['quantity'] ?>" readonly class="update_quantity_cart">
                                        <button type="button" class="up-qtt-cart"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </td>
                                <td>   
                                    <!-- dữ liệu ẩn gốc  -->
                                    <input type="hidden" value="<?= $price ?>" class="defaultTotalPrice">
                                    <!-- dữ liệu ẩn gốc  -->
                                    <!-- dữ liệu ẩn sau khi thao tác -->
                                    <input type="hidden" value="<?= $price * $cart['quantity'] ?>" class="afterTotalPrice">
                                    <!-- dữ liệu ẩn sau khi thao tác -->
                                    <div class="totalPrice">
                                        <?php
                                            $subTotal = $price * $cart['quantity'];
                                            echo number_format($subTotal) . ' VNĐ';
                                        ?>
                                    </div>
                                </td>
                                <th>
                                    <button class="delete-cart">
                                        <!-- dữ liệu ẩn  -->
                                        <input type="hidden" class="productId" value="<?= $cart['productId'] ?>">
                                        <!-- dữ liệu ẩn  -->
                                        <!-- /* --------------------- SIZE và COLOR của từng sản phẩm -------------------- */ -->
                                        <input type="hidden" name="colorId" class="colorId" value="<?= $cart['colorId'] ?>">
                                        <input type="hidden" name="sizeId" class="sizeId" value="<?= $cart['sizeId'] ?>">
                                        <!-- /* --------------------- SIZE và COLOR của từng sản phẩm -------------------- */ -->
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </th>
                            </tr>
                            <?php //HTML
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
                            $total += $subTotal;
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
                        endforeach
                        ?>
                    </table>
                </div>
            </div>
            <div class="sub-cart">
                <div class="box-sub-cart">
                    <div class="title-sub-cart">
                        Sơ bộ
                    </div>
                    <div class="row-infor">
                        <span>Tạm tính</span>
                        <span id="subTotal"><?= number_format($total) ?> VNĐ</span>
                    </div>
                    <div class="row-infor">
                        <span>Vận chuyển</span>
                        <span><span id="totalShip">30,000 VNĐ</span></span>
                    </div>
                    <div class="title-sub-cart">
                        <span>Tổng cộng</span>
                        <span id="total"><?= number_format($total + 30000) ?> VNĐ</span>
                    </div>
                </div>
                <button class="checkout-btn">
                    <a href="?page=checkout">Thanh toán</a>
                </button>
            </div>
        </div>
        <?php // HTML
    }else{
        ?>
        <div class="empty-cart">
            <img src="./assets/image/empty-cart.png" width="100px" alt="">
            <span>Giỏ hàng trống</span>
            <a href="?page=shop">Mua ngay</a>
        </div>
        <?php // HTML
    }
    ?>
    </article>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/update-quantity-cart.js"></script>
<script src="./assets/javascript/delete-cart.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
