<link rel="stylesheet" href="./assets/css/checkout.css">
<?= titlePage("Thanh toán") ?>
<main>
    <article>
    <div id="checkout">
        <div class="main-cart">
            <div class="all-cart">
                <h1>Thanh toán</h1>
                <table id="all-cart">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    <?php
                    //Tổng tiền
                    $total = 0;
                    //Tổng tiền
                    foreach ($result as $cart):
                        ?>
                        <tr class="aCartItem">
                            <td class="infc-product">
                                <img src="./assets/image/<?= $cart['image'] ?>" width="100px" alt="">
                                <span>
                                    <?= $cart['productName'] ?> -
                                    Size: <?= $cart['size'] ?> -
                                    Màu: <?= $cart['color'] ?>
                                </span>
                            </td>
                            <?php 
                            if ($cart['discount'] > 0) {
                                // Xử lý khi có giảm giá
                                $discount_amount = $cart['price'] * ($cart['discount'] / 100); // Tính số tiền giảm giá dựa trên phần trăm
                                $price = $cart['price'] - $discount_amount; // Giá sau khi áp dụng giảm giá
                            } else {
                                $price = $cart['price'];
                            }
                            ?>
                            <td>
                                <?= number_format($price) . ' VNĐ' ?>
                            </td>
                            <td class="quantity-checkout">
                                <input type="number" min="1" value="<?= $cart['quantity'] ?>" readonly class="update_quantity_cart">
                            </td>
                            <td>
                                <!-- dữ liệu ẩn gốc  -->
                                <input type="hidden" value="<?= $price ?>" class="defaultTotalPrice">
                                <!-- dữ liệu ẩn gốc  -->
                                <!-- dữ liệu ẩn sau khi thao tác -->
                                <input type="hidden" value="<?= $price * $cart['quantity'] ?>"
                                    class="afterTotalPrice">
                                <!-- dữ liệu ẩn sau khi thao tác -->
                                <div class="totalPrice">
                                    <?php
                                    $subTotal = $price * $cart['quantity'];
                                    echo number_format($subTotal) . ' VNĐ';
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <?php //HTML
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
                            $total += $subTotal;
                        /* -------------------------------- TỔNG TIỀN ------------------------------- */
                    endforeach
                    ?>
                </table>
            </div>
            <input id="total" type="hidden" value="<?= $total + 30000 ?>">
            <span class="quantity-checkout">Tổng tiền hàng: <?= number_format($total) ?> VNĐ</span>
            <span class="quantity-checkout">Giảm giá coupon: -0 VNĐ</span>
            <span class="quantity-checkout">Phí vận chuyển: + 30,000 VNĐ</span>
            <span class="quantity-checkout">Tổng cộng: <?= number_format($total + 30000) ?> VNĐ</span>
        </div>
        <div class="information-checkout">
            <!-- /* -------------------------------- DATA OLD -------------------------------- */ -->
            <?php 
            $db = require './config/database.php';
            $userController = new User_Controller($db);
            $dataOld = $userController->showInformationUserOld();
            $productController = new Product_Controller($db);
            $provinces = $productController->getAllProvinces();
            ?>
            <!-- /* -------------------------------- DATA OLD -------------------------------- */ -->
            <div><span class="title-inff">Thông tin vận chuyển</span></div>
            <div>
                <input type="text" name="full-name" id="fullname" placeholder="Họ tên" value="<?= (!is_null($dataOld)) ? $dataOld['fullname'] : "" ?>">
            </div>
            <div>
                <input type="text" name="numberphone" id="numberphone" placeholder="SĐT" value="<?= (!is_null($dataOld)) ? $dataOld['numberphone'] : "" ?>">
            </div>
            <div>
                <input type="text" name="address" id="address" placeholder="Địa chỉ nhận hàng" value="<?= (!is_null($dataOld)) ? $dataOld['address'] : "" ?>">
            </div>
            <!-- /* ----------------------------------- NEW ---------------------------------- */ -->
            <!-- /* -------------------------------- LOCATION -------------------------------- */ -->
                       <!-- /* -------------------------------- LOCATION -------------------------------- */ -->
            <!-- /* ----------------------------------- NEW ---------------------------------- */ -->
            <button id="CHECKOUT" class="btn-53">
                <div class="original">Đặt Hàng</div>
                <div class="letters">
                    <span>Đ</span>
                    <span>Ặ</span>
                    <span>T</span>
                    <span style="padding: 0px 2px;"></span>
                    <span>H</span>
                    <span>À</span>
                    <span>N</span>
                    <span>G</span>
                </div>
            </button>
        </div>
    </div>
    </article>
</main>
<!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
<script src="./assets/javascript/checkout.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* --------------------------------- SCRIPT --------------------------------- */ -->