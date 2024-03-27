document.addEventListener("DOMContentLoaded", function () {
    let maxQtt = parseInt(document.getElementById("max-qtt").value);
    let maxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value);
    var addToCart = document.getElementById("add-to-cart");
    var buyNow = document.getElementById("buy-now");
    var productId = document.getElementById("productId");
    var quantity = document.getElementById("quantity_add_cart");

    var colorInputs = document.querySelectorAll('input[name="color"]');
    var sizeInputs = document.querySelectorAll('input[name="size"]');
    var isColorSelected = false;
    var isSizeSelected = false;
    /* ---------------------------------- STYLE --------------------------------- */
        // Lắng nghe sự kiện change cho các input có name="color"
        colorInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                highlightSelectedInput(colorInputs);
            });
        });
    
        // Lắng nghe sự kiện change cho các input có name="size"
        sizeInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                highlightSelectedInput(sizeInputs);
            });
        });
    
        function highlightSelectedInput(inputs) {
            // Bỏ hết lớp "highlight" trước khi thêm lại
            inputs.forEach(function (input) {
                input.classList.remove("highlight");
            });
    
            // Tìm input được chọn và thêm lớp "highlight"
            var selectedInput = Array.from(inputs).find(input => input.checked);
            if (selectedInput) {
                selectedInput.classList.add("highlight");
            }
        }
    /* ---------------------------------- STYLE --------------------------------- */
    addToCart.addEventListener('click', () => {
        for (var i = 0; i < colorInputs.length; i++) {
            if (colorInputs[i].checked) {
                isColorSelected = true;
                var colorId = colorInputs[i].getAttribute('data-color');
                break;
            }
        }

        for (var i = 0; i < sizeInputs.length; i++) {
            if (sizeInputs[i].checked) {
                isSizeSelected = true;
                var sizeId = sizeInputs[i].value;
                break;
            }
        }

        if (!isColorSelected || !isSizeSelected) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Vui lòng chọn size và màu',
            });
            return;
        } else {
            if (quantity.value > maxQtt) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm!',
                });
            } else {
                let newMaxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value);

                if ((parseInt(quantity.value) + maxQttOnCart) > maxQtt) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và bạn đã có ' + maxQttOnCart + ' sản phẩm trong giỏ hàng của mình!',
                    });
                } else {
                    if (parseInt(quantity.value) + newMaxQttOnCart > maxQtt) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và bạn đã có ' + newMaxQttOnCart + ' sản phẩm trong giỏ hàng của mình!',
                        });
                    } else {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "./handles/add-to-cart.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                let result = xhr.responseText;
                                if (result === "Thành công") {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Đã thêm vào giỏ hàng",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });

                                    let quantityCartOld = parseInt(document.getElementById("quantityCartOld").value);
                                    document.getElementById("quantityCart").innerText = quantityCartOld + 1;

                                    document.getElementById("max-qtt-on-cart").value = parseInt(parseInt(quantity.value) + parseInt(document.getElementById("max-qtt-on-cart").value));
                                } else if (result === "Bạn chưa đăng nhập") {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Thông báo',
                                        text: 'Bạn chưa đăng nhập!',
                                        allowOutsideClick: false,
                                        confirmButtonText: "Đăng nhập"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = './auth/?auth=login';
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Lỗi',
                                        text: result,
                                    });
                                }
                            }
                        }
                        xhr.send("productId=" + productId.value + "&quantity=" + quantity.value + "&colorId=" + colorId + "&sizeId=" + sizeId);
                    }
                }
            }
        }
    });
    buyNow.addEventListener('click', () => {
        for (var i = 0; i < colorInputs.length; i++) {
            if (colorInputs[i].checked) {
                isColorSelected = true;
                var colorId = colorInputs[i].getAttribute('data-color');
                break;
            }
        }

        for (var i = 0; i < sizeInputs.length; i++) {
            if (sizeInputs[i].checked) {
                isSizeSelected = true;
                var sizeId = sizeInputs[i].value;
                break;
            }
        }

        if (!isColorSelected || !isSizeSelected) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Vui lòng chọn size và màu',
            });
            return;
        } else {
            if (quantity.value > maxQtt) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm!',
                });
            } else {
                let newMaxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value);

                if ((parseInt(quantity.value) + maxQttOnCart) > maxQtt) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và bạn đã có ' + maxQttOnCart + ' sản phẩm trong giỏ hàng!',
                    });
                } else {
                    if (parseInt(quantity.value) + newMaxQttOnCart > maxQtt) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và bạn đã có ' + newMaxQttOnCart + ' sản phẩm trong giỏ hàng!',
                        });
                    } else {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "./handles/add-to-cart.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                let result = xhr.responseText;
                                if (result === "Thành công") {
                                    window.location.href = '?page=checkout';
                                } else if (result === "Bạn chưa đăng nhập") {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Thông báo',
                                        text: 'Bạn chưa đăng nhập!',
                                        allowOutsideClick: false,
                                        confirmButtonText: "Đăng nhập"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = './auth/?auth=login';
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Lỗi',
                                        text: result,
                                    });
                                }
                            }
                        }
                        xhr.send("productId=" + productId.value + "&quantity=" + quantity.value + "&colorId=" + colorId + "&sizeId=" + sizeId);
                    }
                }
            }
        }
    });
});

/* ---------------- THÊM SẢN PHẨM TỪ TRANG SẢN PHẨM CHI TIẾT ---------------- */
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SHOP (Thêm nhanh - Hover vào sản phẩm) ---------------- */
/* <input class="input" type="text" id="quantity" value="1">
<button id="add-to-cart">Add to cart</button> */
// document.addEventListener('DOMContentLoaded', () => {
//     var products = document.querySelectorAll(".product"); // Chọn hết tất cả sản phẩm
//     products.forEach(function(product) { // Lặp qua từng sản phẩm
//         var addToCart = product.querySelector(".add-to-cart"); // Lấy button của sản phẩm đó
//         var productID = product.querySelector(".productID"); // Lấy id của sản phẩm đó
//         addToCart.addEventListener("click", ()=> { 
//             var xhr = new XMLHttpRequest(); // Tạo 1 đối tượng ajax mới
//             xhr.open("POST", "../handles/add-to-cart.php", true); // Mở
//             xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Cấu hình
//             xhr.onreadystatechange = ()=>{
//                 if(xhr.readyState === 4 && xhr.status === 200){
//                     Swal.fire({
//                     icon: "success",
//                     title: "Success add to cart" + productID.value,
//                     showConfirmButton: false,
//                     timer: 1500,
//                     });
//                 }
//             };
//             xhr.send("productID=" + productID.value + "&quantity=" + "1"); // Gửi
//         });
//     });
// });
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SHOP (Thêm nhanh - Hover vào sản phẩm) ---------------- */

