document.addEventListener("DOMContentLoaded", function () {
    let maxQtt = parseInt(document.getElementById("max-qtt").value);
    let maxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value);
    var addToCart = document.getElementById("add-to-cart-nologin");
    var buyNow = document.getElementById("buy-now-nologin");
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
                        xhr.open("POST", "./handles/add-to-cart-nologin.php", true);
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
                                }
                            }
                        }
                        xhr.send("productId=" + productId.value + "&quantity=" + quantity.value + "&colorId=" + colorId + "&sizeId=" + sizeId + "&action=addtocart");
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
                        xhr.open("POST", "./handles/add-to-cart-nologin.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                let result = xhr.responseText;
                                if (result === "Thành công") {
                                    window.location.href = '?page=checkout';
                                }
                            }
                        }
                        xhr.send("productId=" + productId.value + "&quantity=" + quantity.value + "&colorId=" + colorId + "&sizeId=" + sizeId + "&action=buynow");
                    }
                }
            }
        }
    });
});


