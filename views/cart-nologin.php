<?= titlePage("Giỏ hàng") ?>
<main>
    <article>
    <!-- /* ----------------------------------- NEW ---------------------------------- */ -->
    <?php 
        if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])){
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
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
                            if(isset($_SESSION["cart"])) {
                                foreach($_SESSION["cart"] as $cart) {
                                    // Lấy thông tin chi tiết của sản phẩm từ hàm showCartNoLogin
                                    $cartDetails = showCartNoLogin($cart['productId']);
                                    /* ---------------------------------- VIEW ---------------------------------- */
                                    ?>
                                    <tr class="aCartItem" data-product-id="<?= $cartDetails['id'] ?>">
                                        <td class="infc-product">
                                            <img src="./assets/image/<?= $cartDetails['image'] ?>" width="100px" alt="">
                                            <span><?= $cartDetails['productName'] ?></span>
                                        </td>
                                        <!-- /* ----------------------------------- fix ---------------------------------- */ -->
                                        <?php 
                                        if ($cartDetails['discount'] > 0) {
                                            // Xử lý khi có giảm giá
                                            $discount_amount = $cartDetails['price'] * ($cartDetails['discount'] / 100); // Tính số tiền giảm giá dựa trên phần trăm
                                            $price = $cartDetails['price'] - $discount_amount; // Giá sau khi áp dụng giảm giá
                                        } else {
                                            $price = $cartDetails['price'];
                                        }
                                        ?>
                                        <!-- /* ----------------------------------- fix ---------------------------------- */ -->
                                        <td><?= number_format($price) ?> VNĐ</td>
                                        <td>
                                            <div class="control-quantity" id="ctrQttCart">
                                                <button type="button" class="down-qtt-cart" onclick="changeQuantity(this, 'decrease')"><i class="fa-solid fa-minus"></i></button>
                                                <input type="number" min="1" value="<?= $cart['quantity'] ?>" readonly class="update_quantity_cart">
                                                <button type="button" class="up-qtt-cart" onclick="changeQuantity(this, 'increase')"><i class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td>   
                                            <div class="totalPrice">
                                                <?php
                                                    $subTotal = $price * $cart['quantity'];
                                                    echo number_format($subTotal) . ' VNĐ';
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="delete-cart" onclick="removeCartItem(<?= $cartDetails['id'] ?>)">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php //HTML
                                    $total += $subTotal;
                                    /* ---------------------------------- VIEW ---------------------------------- */
                                }
                            }
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
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
                        <?php 
                        if(isset($_SESSION["user"])){
                            ?>
                            <a href="?page=checkout">Thanh toán</a>
                            <?php //HTML
                        }else{
                            ?>
                            <a href="./auth/?auth=login">Thanh toán</a>
                            <?php //HTML
                        }
                        ?>
                    </button>
                </div>
            </div>
            <?php //HTML
        }else{
            ?>
            <div class="empty-cart">
                <img src="./assets/image/empty-cart.png" width="100px" alt="">
                <span>Giỏ hàng trống</span>
                <a href="?page=shop">Mua ngay</a>
            </div>
            <?php //HTML
        }
        ?>
    <!-- /* ----------------------------------- NEW ---------------------------------- */ -->
    </article>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/update-quantity-cart-nologin.js"></script>
<script src="./assets/javascript/delete-cart.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->

