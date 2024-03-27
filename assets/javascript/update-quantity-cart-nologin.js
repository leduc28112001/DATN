function changeQuantity(button, action) {
    var row = button.closest('.aCartItem');
    var quantityInput = row.querySelector('.update_quantity_cart');
    var currentQuantity = parseInt(quantityInput.value);
    var productId = row.dataset.productId;

    if (action === 'increase') {
        quantityInput.value = currentQuantity + 1;
    } else if (action === 'decrease' && currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }

    updateQuantity(productId, quantityInput.value);
}

function removeCartItem(productId) {
    deleteProduct(productId);
}

function updateQuantity(productId, newQuantity) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./handles/update-quantity-cart-nologin.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
        }
    };
    xhr.send("action=update_quantity&productId=" + productId + "&quantity=" + newQuantity);
}

function deleteProduct(productId) {
    var xhr = new XMLHttpRequest();
    // Hiển thị hộp thoại xác nhận trước khi xóa
    Swal.fire({
    icon: 'warning',
    title: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
    showCancelButton: true,
    confirmButtonText: 'Xóa',
    cancelButtonText: 'Hủy'
    }).then((result) => {
    if (result.isConfirmed) {
        xhr.open("POST", "./handles/update-quantity-cart-nologin.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                Swal.fire({
                    icon: "success",
                    title: "Xóa thành công",
                    allowOutsideClick: false,
                    confirmButtonText: "Làm mới"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '';
                    }
                });
                var row = document.querySelector('.aCartItem[data-product-id="' + productId + '"]');
                if (row) {
                    row.parentNode.removeChild(row);
                }
            }
        };
        xhr.send("action=remove_product&productId=" + productId);
    }});
}