<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra hành động được yêu cầu (thêm, xóa hoặc cập nhật số lượng)
    if (isset($_POST["action"])) {
        $action = $_POST["action"];
        
        switch ($action) {
            case "update_quantity":
                // Cập nhật số lượng của sản phẩm trong giỏ hàng
                if (isset($_POST["productId"]) && isset($_POST["quantity"])) {
                    $productId = $_POST["productId"];
                    $quantity = $_POST["quantity"];
                    updateQuantity($productId, $quantity);
                }
                break;
                
            case "remove_product":
                // Xóa sản phẩm khỏi giỏ hàng
                if (isset($_POST["productId"])) {
                    $productId = $_POST["productId"];
                    removeProduct($productId);
                }
                break;
                
            // Thêm các trường hợp khác nếu cần
                
            default:
                // Hành động không hợp lệ
                http_response_code(400);
                echo "Invalid action";
                break;
        }
    } else {
        // Không có hành động được cung cấp
        http_response_code(400);
        echo "No action provided";
    }
} else {
    // Yêu cầu không hợp lệ
    http_response_code(405);
    echo "Method Not Allowed";
}

// Hàm cập nhật số lượng của sản phẩm trong giỏ hàng
function updateQuantity($productId, $newQuantity) {
    // Lặp qua giỏ hàng và cập nhật số lượng sản phẩm
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as &$cartItem) {
            if ($cartItem["productId"] == $productId) {
                // Kiểm tra số lượng mới không âm
                if ($newQuantity >= 0) {
                    $cartItem["quantity"] = $newQuantity;
                    // Cập nhật giỏ hàng mới
                    $_SESSION["cart"] = array_values($_SESSION["cart"]);
                    echo "Quantity updated successfully";
                    return;
                } else {
                    http_response_code(400);
                    echo "Invalid quantity";
                    return;
                }
            }
        }
    }
    // Sản phẩm không tồn tại trong giỏ hàng
    http_response_code(404);
    echo "Product not found in cart";
}

// Hàm xóa sản phẩm khỏi giỏ hàng
function removeProduct($productId) {
    // Lặp qua giỏ hàng và xóa sản phẩm
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $cartItem) {
            if ($cartItem["productId"] == $productId) {
                unset($_SESSION["cart"][$key]);
                // Cập nhật giỏ hàng mới
                $_SESSION["cart"] = array_values($_SESSION["cart"]);
                echo "Product removed successfully";
                return;
            }
        }
    }
    // Sản phẩm không tồn tại trong giỏ hàng
    http_response_code(404);
    echo "Product not found in cart";
}
?>
