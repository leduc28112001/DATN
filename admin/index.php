<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/image/favicon.png" type="image/x-icon">
    <!-- FAVICON -->
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/banner-style.css">
    <link rel="stylesheet" href="../assets/css/home-style.css">
    <link rel="stylesheet" href="../assets/css/footer-style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/admin-style.css">
    <link rel="stylesheet" href="../assets/css/root.css">
    <!-- CSS -->
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- ICON -->
    <!-- ALERT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.all.min.js"></script>
    <!-- ALERT -->
    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CHART.JS -->
    <!-- CKEDITOR -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <!-- CKEDITOR -->
    <title>Admin</title>
</head>
<body>
    <div id="root">
        <div id="dashboard">
            <div class="controller-dashboard">
                <div>
                    <h1>DashBoard</h1>
                    <a href="../?page=home"><i class="fa-solid fa-earth-americas fa-spin fa-spin-reverse"></i> Cửa hàng</a>
                    <a href="?room=users"><i class="fa-solid fa-users"></i> Người dùng</a>
                    <a href="?room=banners"><i class="fa-solid fa-sliders"></i> Banner</a>
                    <a href="?room=categories"><i class="fa-solid fa-calendar-days"></i> Danh mục</a>
                    <a href="?room=products"><i class="fa-solid fa-boxes-stacked"></i> Sản phẩm</a>
                    <a href="?room=promotions"><i class="fa-solid fa-percent"></i> Khuyến mãi</a>
                    <a href="?room=comments"><i class="fa-regular fa-comments"></i> Bình luận</a>
                    <a href="?room=blogs"><i class="fa-solid fa-blog"></i> Bài viết</a>
                    <a href="?room=orders"><i class="fa-solid fa-cube"></i> Đơn hàng</a>
                    <a href="?room=emails"><i class="fa-regular fa-envelope"></i> Thư</a>
                    <a href="?room=statistical"><i class="fa-solid fa-chart-line"></i> Thống kê</a>
                </div>
                <a href="../auth/?action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
            </div>
            <div class="content-dashboard">
                <!-- /* -------------------------------- VIEW MAIN ------------------------------- */ -->
                <?php include './router-admin.php' // Tất cả các trang của admin được chạy ở đây ?>
                <!-- /* -------------------------------- VIEW MAIN ------------------------------- */ -->
            </div>
        </div>
    </div>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
    <script src="../assets/javascript/alert-condition.js"></script>
    <script src="../assets/javascript/admin/banners.js"></script>
    <script src="../assets/javascript/admin/categories.js"></script>
    <script src="../assets/javascript/admin/products.js"></script>
    <script src="../assets/javascript/admin/add-image-product.js"></script>
    <script src="../assets/javascript/admin/emails.js"></script>
    <script src="../assets/javascript/admin/ckeditor.js"></script>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
    <script src="../assets/javascript/snowfall.js" ></script>
</body>
</html>
