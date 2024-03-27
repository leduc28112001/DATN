document.addEventListener("DOMContentLoaded", () => {
    let aCartItems = document.querySelectorAll(".delete-cart");
    aCartItems.forEach(aCart => {
        aCart.addEventListener("click", () => {
            let productId = aCart.querySelector(".productId").value;
            let sizeId = aCart.querySelector(".sizeId").value;
            let colorId = aCart.querySelector(".colorId").value;
            
            // Hiển thị hộp thoại xác nhận trước khi xóa
            Swal.fire({
                icon: 'warning',
                title: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu người dùng xác nhận xóa, gửi yêu cầu XMLHttpRequest
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "./handles/delete-cart.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = () => {
                        if (xhr.status === 200 && xhr.readyState === 4) {
                            let parentCartItem = aCart.closest(".aCartItem");
                            if (parentCartItem) {
                                parentCartItem.remove();
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
                            }
                        }
                    };
                    xhr.send("productId=" + productId + '&colorId=' + colorId + '&sizeId=' + sizeId);
                }
            });
        });
    });
});


/* ----------------- CHUYỂN TRANG CHO TỪNG CART (TRANG CART) ---------------- */
function redirectToProduct(element) {
    var productId = element.getAttribute('data-product-id');
    window.location.href = '?page=details&id=' + productId;
}
/* ----------------- CHUYỂN TRANG CHO TỪNG CART (TRANG CART) ---------------- */
