<?php 
class Checkout_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    function checkout(){
        $mess = "";
        session_start();
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        $fullname = (isset($_POST["fullname"])) ? $_POST["fullname"] : "";
        $numberphone = (isset($_POST["numberphone"])) ? $_POST["numberphone"] : "";
        $address = (isset($_POST["address"])) ? $_POST["address"] : "";
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $createdate = date("Y-m-d H:i:s");
        $total = (isset($_POST["total"])) ? $_POST["total"] : "";
        $process = "send";
        $status = "unpaid";

        if(!empty($userId) && is_numeric($userId)){
            if(!empty(trim($fullname)) && !empty(trim($address)) && !empty(trim($numberphone))){
                // Thêm thông tin người dùng
                    $updateInformation = $this->db->prepare("UPDATE users SET fullName = ?, address = ?, numberphone = ? WHERE id = ?");
                    $updateInformation->bind_param("sssi", $fullname, $address, $numberphone, $userId);
                    $updateInformation->execute();
                    /* --------------------- SAU KHI XỬ LÍ THÔNG TIN CÁ NHÂN -------------------- */
                    // MÃ GIẢM GIÁ Ở ĐÂY
                    $promotionId = 2;
                    // MÃ GIẢM GIÁ Ở ĐÂY
                    // Tạo đơn hàng tổng quát
                    $createOrder = $this->db->prepare("INSERT INTO orders(`userId`,`createdate`,`total`,`promotionId`,`process`,`status`,`address`) VALUES (?,?,?,?,?,?,?)");
                    $createOrder->bind_param("isiisss", $userId, $createdate, $total, $promotionId, $process, $status, $address);
                    if($createOrder->execute()){
                        $orderId = $createOrder->insert_id; // Lấy id của đơn hàng vừa thêm
                        // Lấy tất cả sản phẩm trong giỏ hàng
                        $allCart = $this->db->prepare(
                            "SELECT carts.productId AS productId, carts.quantity AS quantity, products.price AS price, products.discount AS discount,carts.colorId AS colorId, carts.sizeId AS sizeId 
                            FROM carts
                            INNER JOIN products 
                            ON carts.productId = products.id
                            WHERE userId = ?"
                        );
                        $allCart->bind_param("i", $userId);
                        if($allCart->execute()){
                            $resultAllCart = $allCart->get_result();
                            $quantityCart = $resultAllCart->num_rows;
                            $quantityCompleted = 0;
                            // Tạo đơn hàng chi tiết
                            while($aOrderDetails = $resultAllCart->fetch_assoc()){
                                $producyId = $aOrderDetails['productId'];
                                $sizeId = $aOrderDetails['sizeId'];
                                $colorId = $aOrderDetails['colorId'];
                                $quantity = $aOrderDetails['quantity'];
                                if ($aOrderDetails['discount'] > 0) {
                                    // Xử lý khi có giảm giá
                                    $discount_amount = $aOrderDetails['price'] * ($aOrderDetails['discount'] / 100); // Tính số tiền giảm giá dựa trên phần trăm
                                    $price = $aOrderDetails['price'] - $discount_amount; // Giá sau khi áp dụng giảm giá
                                } else {
                                    $price = $aOrderDetails['price'];
                                }
                                $total = $quantity * $price;
                                $createOrderDetails = $this->db->prepare("INSERT INTO orderdetails (`orderId`,`productId`,`sizeId`,`colorId`,`quantity`,`price`,`total`) VALUES (?,?,?,?,?,?,?)");
                                $createOrderDetails->bind_param("iiiiiii", $orderId, $producyId, $sizeId, $colorId, $quantity, $price, $total);
                                if($createOrderDetails->execute()){
                                    $quantityCompleted ++;
                                }
                            }
                            if($quantityCart === $quantityCompleted){
                                // Xóa cart
                                $deleteCart = $this->db->prepare("DELETE FROM carts WHERE userId = ?");
                                $deleteCart->bind_param("i", $userId);
                                if($deleteCart->execute()){
                                    $mess = "Thành công";
                                }
                            }else{
                                $mess = "Chưa đủ";
                            }
                        }else{
                            $mess = "Lỗi 1";
                        }
                    }else{
                        $mess = "Lỗi 2";
                    }
                    /* --------------------- SAU KHI XỬ LÍ THÔNG TIN CÁ NHÂN -------------------- */
            }else{
                $mess = "Chưa nhập đầy đủ thông tin";
            }
        }else{
            $mess = "Bạn chưa đăng nhập";
        }
        return $mess;
    }
}
