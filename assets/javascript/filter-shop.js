/* --------------------------- LỌC THEO TRẠNG THÁI -------------------------- */
document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử select
    var statusSelect = document.getElementById("fillter-status");

    // Lấy danh sách sản phẩm
    var products = document.querySelectorAll(".product");

    // Thêm sự kiện cho select status
    statusSelect.addEventListener("change", function () {
        // Lọc sản phẩm theo trạng thái
        filterByStatus(statusSelect.value);
    });

    function filterByStatus(selectedStatus) {
        // Lặp qua danh sách sản phẩm và ẩn/hiện sản phẩm dựa trên trạng thái
        products.forEach(function (product) {
            var productStatus = product.getAttribute("data-filter");
            if (selectedStatus === "none" || productStatus === selectedStatus) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    }
});
/* --------------------------- LỌC THEO TRẠNG THÁI -------------------------- */
/* ------------------------------ LỌC THEO GIÁ ------------------------------ */
document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử select
    var priceSelect = document.getElementById("fillter-price");

    // Lấy danh sách sản phẩm
    var products = document.querySelectorAll(".product");

    // Thêm sự kiện cho select giá
    priceSelect.addEventListener("change", function () {
        // Lọc sản phẩm theo giá
        filterByPrice(priceSelect.value);
    });

    function filterByPrice(selectedPrice) {
        // Lặp qua danh sách sản phẩm và ẩn/hiện sản phẩm dựa trên giá
        products.forEach(function (product) {
            var productPrice = parseFloat(product.querySelector(".price span").innerText.replace("VNĐ", "").replace(",", ""));
            if (selectedPrice === "") {
                // Hiển thị tất cả sản phẩm nếu không có giá trị nào được chọn
                product.style.display = "block";
            } else {
                switch(selectedPrice) {
                    case "100000":
                        // Dưới 100,000 VNĐ
                        if (productPrice < 100000) {
                            product.style.display = "block";
                        } else {
                            product.style.display = "none";
                        }
                        break;
                    case "200000":
                        // Từ 100,000 đến 200,000 VNĐ
                        if (productPrice >= 100000 && productPrice <= 200000) {
                            product.style.display = "block";
                        } else {
                            product.style.display = "none";
                        }
                        break;
                    case "300000":
                        // Từ 200,000 đến 300,000 VNĐ
                        if (productPrice >= 200000 && productPrice <= 300000) {
                            product.style.display = "block";
                        } else {
                            product.style.display = "none";
                        }
                        break;
                    case "400000":
                        // Từ 300,000 đến 400,000 VNĐ
                        if (productPrice >= 300000 && productPrice <= 400000) {
                            product.style.display = "block";
                        } else {
                            product.style.display = "none";
                        }
                        break;
                    case "9999999":
                        // Trên 400,000 VNĐ
                        if (productPrice > 400000) {
                            product.style.display = "block";
                        } else {
                            product.style.display = "none";
                        }
                        break;
                }
            }
        });
    }
});
/* ------------------------------ LỌC THEO GIÁ ------------------------------ */


/* ---------------------- LỌC THEO TEXT + TĂNG GIẢM DẦN --------------------- */
document.addEventListener("DOMContentLoaded", function () {
    // Lấy các phần tử select
    var textSelect = document.getElementById("fillter-text");

    // Lấy danh sách sản phẩm
    var products = document.querySelectorAll(".product");

    // Thêm sự kiện cho select text
    textSelect.addEventListener("change", function () {
        // Sắp xếp sản phẩm theo tùy chọn
        sortProducts(textSelect.value);
    });

    function sortProducts(selectedOption) {
        // Lấy danh sách sản phẩm và chuyển đổi thành mảng để sử dụng sort
        var productsArray = Array.from(products);

        switch (selectedOption) {
            case "az":
                // Sắp xếp a-z
                productsArray.sort(function (a, b) {
                    var titleA = a.querySelector(".title").innerText.toUpperCase();
                    var titleB = b.querySelector(".title").innerText.toUpperCase();
                    return titleA.localeCompare(titleB);
                });
                break;
            case "za":
                // Sắp xếp z-a
                productsArray.sort(function (a, b) {
                    var titleA = a.querySelector(".title").innerText.toUpperCase();
                    var titleB = b.querySelector(".title").innerText.toUpperCase();
                    return titleB.localeCompare(titleA);
                });
                break;
            case "increasing":
                // Sắp xếp giá tăng dần
                productsArray.sort(function (a, b) {
                    var priceA = parseFloat(a.querySelector(".price span").innerText.replace("VNĐ", "").replace(",", ""));
                    var priceB = parseFloat(b.querySelector(".price span").innerText.replace("VNĐ", "").replace(",", ""));
                    return priceA - priceB;
                });
                break;
            case "decreasing":
                // Sắp xếp giá giảm dần
                productsArray.sort(function (a, b) {
                    var priceA = parseFloat(a.querySelector(".price span").innerText.replace("VNĐ", "").replace(",", ""));
                    var priceB = parseFloat(b.querySelector(".price span").innerText.replace("VNĐ", "").replace(",", ""));
                    return priceB - priceA;
                });
                break;
        }

        // Gán lại thứ tự sản phẩm trong danh sách
        productsArray.forEach(function (product) {
            document.getElementById("product-list").appendChild(product);
        });
    }
});
/* ---------------------- LỌC THEO TEXT + TĂNG GIẢM DẦN --------------------- */
