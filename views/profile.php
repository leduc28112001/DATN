<?= titlePage("Hồ sơ") ?>
<main>
    <article>
    <div id="my-profile">
        <h1>Hồ sơ</h1>
        <div class="my-profile">
            <div class="avatar">
                <?php
                if(isset($result) && isset($result['avatar']) && $result['avatar'] !== ""){
                    ?><img src="./uploads/<?= $result['avatar'] ?>" alt=""><?php //HTML
                }else{
                    ?><img src='https://thethaovanhoa.mediacdn.vn/Upload/O5NP4aFt6GVwE7JTFAOaA/files/2022/06/son-tung-mtp-va-hai-tu%20(1).jpg' alt=''><?php
                }
                ?>
                <form action="./handles/uploadAvatar.php" method="POST" enctype="multipart/form-data" id="uploadAvatar" onsubmit="return validateUpload()">
                    <input hidden type="file" name="avatar" id="avatar">
                    <label for="avatar"><i class="fa-solid fa-upload"></i></label>
                    <button>Cập nhật</button>
                </form>
            </div>
            <div class="infor-user-profile">
                <div id="boxs-infor">
                    <div class="box-infor">
                        <label for="">Họ và tên</label>
                        <input type="text" value="<?= (isset($result)) ? $result['fullname'] : "" ?>" disabled>
                    </div>
                    <div class="box-infor">
                        <label for="">Email</label>
                        <input type="text" value="<?= (isset($result)) ? $result['email'] : "" ?>" disabled>
                    </div>
                    <div class="box-infor">
                        <label for="">Địa chỉ</label>
                        <input type="text" value="<?= (isset($result)) ? $result['address'] : "" ?>" disabled>
                    </div>
                    <div class="box-infor">
                        <label for="">Số điện thoại</label>
                        <input type="text" value="<?= (isset($result)) ? $result['numberphone'] : "" ?>" disabled>
                    </div>
                </div>
                <button id="editProfile">Cập nhật hồ sơ</button>
                <!-- /* -------------------------------- FORM EDIT ------------------------------- */ -->
                <form action="" onsubmit="return false" method="POST" id="editInformationUser"
                    enctype="multipart/form-data">
                    <div id="boxs-infor">
                        <div class="box-infor">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" id="fullName" value="<?= (isset($result)) ? $result['fullname'] : "" ?>" placeholder="Nhập họ và tên">
                        </div>
                        <div class="box-infor">
                            <label for="">Email</label>
                            <input type="email" id="email" value="<?= (isset($result)) ? $result['email'] : "" ?>" placeholder="Nhập email">
                        </div>
                        <div class="box-infor">
                            <label for="">Địa chỉ</label>
                            <input type="text" id="address" value="<?= (isset($result)) ? $result['address'] : "" ?>" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="box-infor">
                            <label for="">Số điện thoại</label>
                            <input type="text" id="numberphone" value="<?= (isset($result)) ? $result['numberphone'] : "" ?>" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="flex">
                        <a href="" class="backProfile"><i class="fa-solid fa-left-long"></i></a>
                        <button id="eP">Cập nhật</button>
                    </div>
                </form>
                <!-- /* -------------------------------- FORM EDIT ------------------------------- */ -->
            </div>
        </div>
        <!-- /* ------------------------------ ORDER DETAILS ----------------------------- */ -->
        <?php 
        require './config/database.php';
        if(isset($_POST["viewDetails"])){
            $orderId = $_POST["id"];
            $stmt = $db->prepare(
            "SELECT sizes.size AS size, colors.color AS color,products.productName AS productName, orderdetails.price AS price, orderdetails.quantity AS quantity, orderdetails.total AS total
            FROM orderdetails
            INNER JOIN products 
            ON orderdetails.productId = products.id
            INNER JOIN colors 
            ON colors.id = orderdetails.colorId
            INNER JOIN sizes 
            ON sizes.id = orderdetails.sizeId
            WHERE orderId = ?");
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $result = $stmt->get_result();
            ?>
                <h1>Chi tiết đơn hàng</h1>
                <div class="my-order">
                    <table>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th class="rpbl">Giá (VNĐ)</th>
                            <th class="rpbl">Màu</th>
                            <th class="rpbl">Size</th>
                            <th class="rpbl">Số lượng</th>
                            <th style="text-align: right;">Tổng cộng (VNĐ)</th>
                        </tr>
                        <?php 
                        $totalEnd = 0; 
                        foreach ($result as $orderDT) :
                        ?>
                        <tr>
                            <td><?= $orderDT['productName'] ?></td>
                            <td class="rpbl"><?= number_format($orderDT['price']) ?> VNĐ</td>
                            <td class="rpbl"><?= $orderDT['color'] ?></td>
                            <td class="rpbl"><?= $orderDT['size'] ?></td>
                            <td class="rpbl"><?= $orderDT['quantity'] ?></td>
                            <td style="text-align: right;"><?= number_format($orderDT['total']) ?> VNĐ</td>
                        </tr>
                        <?php //HTML
                        $totalEnd += $orderDT['price'] * $orderDT['quantity'];
                        endforeach
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Vận chuyển 30,000 VNĐ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;">Tổng cộng <?= number_format($totalEnd + 30000) ?> VNĐ</td>
                        </tr>
                    </table>
                </div>
            <?php //HTML
        }
        ?>
        <!-- /* ------------------------------ ORDER DETAILS ----------------------------- */ -->
        <!-- /* -------------------------------- MY ORDER -------------------------------- */ -->
        <?php 
        $db = require "./config/database.php";
        $orderController = new Order_Controller($db);
        $orders = $orderController->showOrderWeb();
        if(isset($orders)){
            ?>
            <h1>Lịch sử đơn hàng</h1>
            <div class="my-order">
                <table>
                    <tr>
                        <th>Ngày đặt hàng</th>
                        <th class="rpbl">Tổng cộng (VNĐ)</th>
                        <th class="rpbl">Trạng thái</th>
                        <th>Tiến trình</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php 
                    foreach ($orders as $order) :
                    ?>
                    <tr>
                        <td><?= $order['createdate'] ?></td>
                        <td class="rpbl"><?= number_format($order['total']) ?> VNĐ</td>
                        <td class="rpbl">
                            <?php
                            if($order['status'] == 'unpaid'){
                                echo "Chưa thanh toán";
                            }
                            if($order['status'] == 'paid'){
                                echo "Đã thanh toán";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($order['process'] == 'send'){
                                echo "Đã gửi";
                            }
                            if($order['process'] == 'processing'){
                                echo "Đang xử lí";
                            } 
                            if($order['process'] == 'delivering'){
                                echo "Đang giao hàng";
                            } 
                            if($order['process'] == 'completed'){
                                echo "Đã giao hàng";
                            } 
                            if($order['process'] == 'confirm'){
                                echo "Đã nhận";
                            }  
                            ?>
                        </td>
                        <!-- XỬ LÍ HIỂN THỊ -->
                        <?php 
                        if($order['process'] == "send"){
                            ?>
                            <td class="actionOrderClient">
                                <form action="?page=profile&action=cancel-order&id=<?= $order['id'] ?>" method="POST">
                                    <input name="id" hidden type="number" id="idOrder" value="<?= $order['id'] ?>">
                                    <!-- <button onclick="return confirm('Bạn chắc chứ?')" class="cancelBtn"><i class="fa-solid fa-xmark"></i> Hủy</button> -->
                                </form>
                                <form action="" method="POST">
                                    <input name="id" hidden type="number" id="idOrder" value="<?= $order['id'] ?>">
                                    <button name="viewDetails"><i class="fa-solid fa-eye"></i> Chi tiết</button>
                                </form>
                            </td>
                            <?php //HTML
                        }else{
                            ?>
                            <td class="actionOrderClient" style="color: gray;">
                                <form action="" method="POST">
                                    <input name="id" hidden type="number" id="idOrder" value="<?= $order['id'] ?>">
                                    <button name="viewDetails"><i class="fa-solid fa-eye"></i> Chi tiết</button>
                                </form>
                            </td>
                            <?php //HTML
                        }
                        ?>
                        <!-- XỬ LÍ HIỂN THỊ -->
                    </tr>
                    <?php //HTML
                    endforeach
                    ?>
                </table>
            </div>
            <?php //HTML
        }else{
            messRed("Chưa có đơn hàng nào");
        }
        ?>
        <!-- /* -------------------------------- MY ORDER -------------------------------- */ -->
    </div>
    </article>
</main>
<!-- Xử lí hiển thị -->
<?= (isset($alertUpdate) && $alertUpdate === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Hủy đơn hàng thành công',allowOutsideClick: false,}).then((result) => { if (result.isConfirmed) {window.location.href = '?page=profile';}});</script>" : ""?>
<?= (isset($alertUpdate) && $alertUpdate === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Lỗi!',allowOutsideClick: false,}).then((result) => { if (result.isConfirmed) {window.location.href = '?page=profile';}});</script>" : "" ?>
<!-- Xử lí hiển thị -->
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/search.js"></script>
<script src="./assets/javascript/my-profile.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->