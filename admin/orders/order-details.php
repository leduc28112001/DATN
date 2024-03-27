<a href="?room=orders" class="back"><i class="fa-solid fa-left-long"></i></a>
<table style="width:100%;">
    <?php 
    require '../config/database.php';
    $orderId = (isset($_GET["orderId"])) ? $_GET["orderId"] : "";
    $stmt = $db->prepare(
    "SELECT sizes.size AS size, colors.color AS color,products.productName AS productName, products.id AS productId, orderdetails.price AS price, orderdetails.quantity AS quantity, orderdetails.total AS total
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
    if(isset($result)){
        ?>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Màu</th>
                <th>Size</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
                <th>Thao tác</th>
            </tr>
        <?php // HTML
        foreach ($result as $orderDetails) :
            ?>
            <tr>
                <td><?= $orderDetails['productId'] ?></td>
                <td><?= $orderDetails['productName'] ?></td>
                <td><?= $orderDetails['quantity'] ?></td>
                <td><?= $orderDetails['color'] ?></td>
                <td><?= $orderDetails['size'] ?></td>
                <td><?= number_format($orderDetails['price']) ?> VNĐ</td>
                <td><?= number_format($orderDetails['total']) ?> VNĐ</td>
                <td class="actions">
                    <form action="" method="POST">
                        <button onclick="return confirmDelete('?room=order-details&action=delete-order-details&id=<?= $orderDetails['productId'] ?>&orderId=<?= $_GET['orderId'] ?>')" name="deleteOrderDetails" class="red">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php // HTML
        endforeach;
    }else{
        if(!isset($alertDelete)){
            messRed("Trống details");
        }
    }
    ?>
</table>
<input type="hidden" id="orderId" value="<?= (isset($_GET["orderId"])) ? $_GET["orderId"] : "" ?>">
<!-- Xử lí hiển thị -->
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script> let orderId = document.getElementById('orderId').value;;Swal.fire({icon: 'success',title: 'Thành công',text: 'Xóa thành công',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=order-details&orderId='+orderId;}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->