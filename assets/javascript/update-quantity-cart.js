document.addEventListener("DOMContentLoaded", () => {
    let carts = document.querySelectorAll(".aCartItem");
    carts.forEach((cart) => {
        let productId = cart.querySelector(".productId");
        let downQttCart = cart.querySelector(".down-qtt-cart");
        let upQttCart = cart.querySelector(".up-qtt-cart");
        let quantityUpdate = cart.querySelector(".update_quantity_cart");
        let sizeId = cart.querySelector(".sizeId").value;
        let colorId = cart.querySelector(".colorId").value;
        let valid = quantityUpdate.value;
        let qtt = parseInt(quantityUpdate.value);
        let max_qtt = parseInt(document.getElementById("max-qtt").value);
        
        downQttCart.addEventListener('click', () => {
            if (quantityUpdate.value > 1) { // Kiểm tra nếu số lượng sản phẩm lớn hơn 1
                let xhr = new XMLHttpRequest();
                xhr.open(
                    "POST",
                    "./handles/update-quantity-cart.php",
                    true
                );
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = () => {
                    let result = xhr.responseText; // Số lượng mới được trả từ PHP
                    quantityUpdate.value = result; // Hiển thị lại số lượng mới
                    let price_default = cart.querySelector(".defaultTotalPrice").value; // Giá gốc của từng sản phẩm
                    cart.querySelector(".totalPrice").innerHTML = (price_default * result).toLocaleString() + " VNĐ"; // Hiển thị total mới
                    cart.querySelector(".afterTotalPrice").value = price_default * result; // Lưu lại giá trị total mới 
                    let listAfterTotalPrice = document.querySelectorAll(".afterTotalPrice"); // Lấy list input ẩn mang total sau khi đã thao tác
                    let subTotal = 0;
                    listAfterTotalPrice.forEach((nghia) => {
                        subTotal += parseInt(nghia.value); // Cộng dồn tổng giá của từng cart
                    });
                    let totalEnd = subTotal + 30000;
                    document.getElementById("subTotal").innerHTML = subTotal.toLocaleString() + " VNĐ"; // Cập nhật lại giá tổng đơn hàng
                    document.getElementById("total").innerHTML = totalEnd.toLocaleString() + " VNĐ"; // Cập nhật lại giá tổng đơn hàng cuối
                    if (result == "0") {
                        let cut = cart.closest(".aCartItem");
                        if (cut) {
                            cut.remove();
                        }
                    }
                }
                xhr.send("productId=" + productId.value + "&action=down" + '&colorId=' + colorId + '&sizeId=' + sizeId);
            }
        });

        upQttCart.addEventListener('click', () => {
            if (quantityUpdate.value >= max_qtt) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There are only ' + max_qtt + ' left of the product!',
                });
            } else {
                let xhr = new XMLHttpRequest();
                xhr.open(
                    "POST",
                    "./handles/update-quantity-cart.php",
                    true
                );
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let result = xhr.responseText; // Số lượng mới được trả từ PHP
                        quantityUpdate.value = result; // Hiển thị lại số lượng mới
                        let price_default = cart.querySelector(".defaultTotalPrice").value; // Giá gốc của từng sản phẩm
                        cart.querySelector(".totalPrice").innerHTML = (price_default * result).toLocaleString() + " VNĐ"; // Hiển thị total mới
                        cart.querySelector(".afterTotalPrice").value = price_default * result; // Lưu lại giá trị total mới 
                        let listAfterTotalPrice = document.querySelectorAll(".afterTotalPrice"); // Lấy list input ẩn mang total sau khi đã thao tác
                        let subTotal = 0;
                        listAfterTotalPrice.forEach((nghia) => {
                            subTotal += parseInt(nghia.value); // Cộng dồn tổng giá của từng cart
                        });
                        let totalEnd = subTotal + 30000;
                        document.getElementById("subTotal").innerHTML = subTotal.toLocaleString() + " VNĐ"; // Cập nhật lại giá tổng đơn hàng tạm thời
                        document.getElementById("total").innerHTML = totalEnd.toLocaleString() + " VNĐ"; // Cập nhật lại giá tổng đơn hàng cuối
                    }
                }
                xhr.send("productId=" + productId.value + "&action=up" + '&colorId=' + colorId + '&sizeId=' + sizeId);
            }
        });
    });
});
