<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kiểm tra session giỏ hàng
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    // Lấy thông tin sản phẩm từ request và làm sạch dữ liệu
    $productId = filter_input(INPUT_POST, "productId", FILTER_SANITIZE_STRING);
    $quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);
    $colorId = filter_input(INPUT_POST, "colorId", FILTER_SANITIZE_STRING);
    $sizeId = filter_input(INPUT_POST, "sizeId", FILTER_SANITIZE_STRING);
    $action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

    // Kiểm tra dữ liệu đã được truyền đủ và hợp lệ hay không
    if ($productId !== null && $quantity !== null && $colorId !== null && $sizeId !== null && $action !== null) {
        // Biến flag để kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay không
        $productExists = false;

        // Duyệt qua các sản phẩm trong giỏ hàng để kiểm tra trùng lặp
        foreach ($_SESSION["cart"] as &$product) {
            if ($product["productId"] === $productId) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng
                if ($product["colorId"] === $colorId && $product["sizeId"] === $sizeId) {
                    // Nếu sản phẩm trùng với size và màu, cập nhật số lượng
                    $product["quantity"] += $quantity;
                    $productExists = true;
                    break;
                } elseif ($product["colorId"] === $colorId && $product["sizeId"] !== $sizeId) {
                    // Nếu sản phẩm trùng màu nhưng khác size, tạo sản phẩm mới với size mới
                    $newProduct = [
                        "productId" => $productId,
                        "quantity" => $quantity,
                        "colorId" => $colorId,
                        "sizeId" => $sizeId
                    ];
                    $_SESSION["cart"][] = $newProduct;
                    $productExists = true;
                    break;
                } elseif ($product["colorId"] !== $colorId && $product["sizeId"] === $sizeId) {
                    // Nếu sản phẩm trùng size nhưng khác màu, tạo sản phẩm mới với màu mới
                    $newProduct = [
                        "productId" => $productId,
                        "quantity" => $quantity,
                        "colorId" => $colorId,
                        "sizeId" => $sizeId
                    ];
                    $_SESSION["cart"][] = $newProduct;
                    $productExists = true;
                    break;
                }
            }
        }

        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào
        if (!$productExists) {
            $newProduct = [
                "productId" => $productId,
                "quantity" => $quantity,
                "colorId" => $colorId,
                "sizeId" => $sizeId
            ];
            $_SESSION["cart"][] = $newProduct;
        }

        // Trả về thông báo thành công
        echo "Thành công";
        // Nếu hành động là mua ngay, chuyển hướng đến trang đăng nhập
        if ($action === 'buynow') {
            header("Location: ../auth/?auth=login");
            exit(); // Chắc chắn không có mã HTML hoặc text được xuất ra sau lệnh header
        }
    } else {
        // Dữ liệu không hợp lệ, trả về lỗi
        http_response_code(400);
        echo "Dữ liệu không hợp lệ";
    }
} else {
    // Nếu không phải là phương thức POST, trả về lỗi
    http_response_code(405);
    echo "Phương thức không được hỗ trợ";
}
?>
