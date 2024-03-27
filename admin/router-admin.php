<!-- /* --------------------------------- ROUTER --------------------------------- */ -->
<?php
include '../component/functionsHTML.php';
include '../config/config.php';
/* ---------------------------------- MODEL --------------------------------- */
include '../models/product-model.php';
include '../models/category-model.php';
include '../models/order-model.php';
include '../models/comment-model.php';
include '../models/banner-model.php';
include '../models/email-model.php';
include '../models/statistical-model.php';
include '../models/promotion-model.php';
include '../models/blog-model.php';
/* ---------------------------------- MODEL --------------------------------- */
/* ---------------------------------- CONTROLLER --------------------------------- */
include '../controllers/product-controller.php';
include '../controllers/category-controller.php';
include '../controllers/order-controller.php';
include '../controllers/comment-controller.php';
include '../controllers/banner-controller.php';
include '../controllers/email-controller.php';
include '../controllers/statistical-controller.php';
include '../controllers/promotion-controller.php';
include '../controllers/blog-controller.php';
/* ---------------------------------- CONTROLLER --------------------------------- */
/* ---------------------------------- AUTH ---------------------------------- */ 
include './auth-role.php'; // Xác thực quyền
// controller và model user nằm trong auth-role
/* ---------------------------------- AUTH ---------------------------------- */ 
define("ROOM", isset($_GET["room"]) ? $_GET["room"] : "");
define("ACTION", isset($_GET["action"]) ? $_GET["action"] : "");
/* -------------------------------- VIEW MAIN ------------------------------- */
$db = require '../config/database.php';
$userController = new User_Controller($db);
$categoryController = new Category_Controller($db);
$productController = new Product_Controller($db);
$orderController = new Order_Controller($db);
$commentController = new Comment_Controller($db);
$bannerController = new Banner_Controller($db);
$emailController = new Email_Controller($db);
$statisticalController = new Statistical_Controller($db);
$promotionController = new Promotion_Controller($db);
$blogController = new Blog_Controller($db);
if (!empty(ROOM)) {
    if (ROOM === 'statistical') { // trang thống kê
        $statisticalController->statisticalOrder();
    }elseif (ROOM === 'users') { // trang tài khoản người dùng
        $userController->disableBomm();
        $userController->showUserList();
    }elseif (ROOM === 'information-user') { // trang thông tin chi tiết người dùng
        $userController->showInformationUser();
    }elseif (ROOM === 'products') { // trang sản phẩm
        $productController->showProductList();
    }elseif (ROOM === 'add-product') { // trang thêm sản phẩm
        $productController->addProduct();
    }elseif (ROOM === 'edit-product') { // trang sửa sản phẩm
        $productController->editProduct();
    }elseif (ROOM === 'images') { // trang ảnh chi tiết sản phẩm
        $productController->showAImageMore();
    }elseif (ROOM === 'banners') { // trang banner
        $bannerController->showBannerList();
    }elseif(ROOM === 'add-banner'){ // trang thêm banner
        include './banners/add-banner.php';
    }elseif(ROOM === 'edit-banner'){ // trang sửa banner
        $bannerController->editBanner();
    }elseif (ROOM === 'details-product') { // trang chi tiết sản phẩm
        $productController->detailsProduct();
    }elseif (ROOM === 'add-category') { // trang thêm danh mục
        include './categories/add-category.php';
    }elseif (ROOM === 'edit-category') { // trang sửa danh mục
        $categoryController->editCategory();
    }elseif (ROOM === 'categories') { // trang danh mục
        $categoryController->showCategories();
    }elseif (ROOM === 'orders') { // trang đơn hàng
        $orderController->showOrderList();
    }elseif(ROOM === 'order-details'){ // trang đơn hàng chi tiết
        $orderController->showOrderDetails();
    }elseif(ROOM === 'order-address'){ // trang địa chỉ đơn hàng 
        $orderController->showOrderAddress();
    }elseif(ROOM === 'comments'){ // trang bình luận
        $commentController->showListComment();
    }elseif(ROOM === 'comment-details'){ // trang chi tiết bình luận
        $commentController->showListCommentDetails();
    }elseif(ROOM === 'emails'){ // trang hộp thư
        $emailController->showEmailList();
    }elseif(ROOM === 'email-details'){ // trang chi tiết hộp thư
        $emailController->showMessageEmail();
    }elseif(ROOM === 'reply-email'){ // trang trả lời thư
        include './emails/reply-email.php';
    }elseif(ROOM === 'blogs'){ // trang bài viết
        $blogController->showBlogList();
    }elseif(ROOM === 'add-blog'){ // trang thêm bài viết
        include './blogs/add-blog.php';
    }elseif(ROOM === 'edit-blog'){ // trang sửa bài viết
        $blogController->editblog();
    }elseif(ROOM === 'promotions'){ // trang khuyến mãi
        $promotionController->showPromotionList();
    }elseif(ROOM === 'add-promotion'){ // trang thêm khuyến mãi
        include './promotions/add-promotion.php';
    }elseif(ROOM === 'edit-promotion'){ // trang sửa khuyến mãi
        $promotionController->editPromotion();
    }elseif(ROOM === 'add-color'){ // trang thêm màu sản phẩm
        $productController->showListColor();
    }elseif(ROOM === 'add-size'){ // trang thêm kích cỡ sản phẩm
        $productController->showListSize();
    }
    // NOT FOUND
    else {
        header("Location: ../404/");
    }
    // NOT FOUND
}
/* -------------------------------- VIEW MAIN ------------------------------- */
/* --------------------------------- ACTION --------------------------------- */
if(!empty(ACTION)){
    if(ACTION === 'updateUser'){ // cập nhật trạng thái tài khoản người dùng
        $userController->updateUser();
        header("Location: ./?room=users");
    }elseif(ACTION === 'add-category'){ // thêm danh mục
        $categoryController->addCategory();
    }elseif(ACTION === 'edit-category'){ // sửa danh mục
        $categoryController->editCategory();
    }elseif(ACTION === 'delete-category'){ // xóa danh mục
        $categoryController->deleteCategory();
    }elseif(ACTION === 'add-product'){ // thêm sản phẩm
        $productController->addProduct();
    }elseif(ACTION === 'edit-product'){ // sửa sản phẩm
        $productController->editProduct();
    }elseif(ACTION === 'update-status-product'){ // cập nhật trạng thái sản phẩm
        $productController->updateStatusProduct();
    }elseif(ACTION === 'delete-product'){ // xóa sản phẩm
        $productController->deleteProduct();
    }elseif(ACTION === 'delete-image'){ // xóa ảnh sản phẩm
        $productController->deleteImageMore();
    }elseif(ACTION === 'receive-order'){ // cập nhật người chịu trách nhiệm đơn hàng
        $orderController->receiveOrder();
    }elseif(ACTION === 'update-order'){ // cập nhật trạng thái đơn hàng
        $orderController->updateOrder();
    }elseif(ACTION === 'delete-order'){ // xóa đơn hàng
        $orderController->deleteOrder();
    }elseif(ACTION === 'delete-order-details'){ // xóa đơn hàng chi tiết
        $orderController->deleteOrderDetails();
    }elseif(ACTION === 'delete-comment'){ // xóa bình luận
        $commentController->deleteCommentAdmin();
    }elseif(ACTION === 'update-rate-comment'){ // cập nhật trạng thái bình luận
        $commentController->updateRateComment();
    }elseif(ACTION === 'delete-comment-details'){ // xóa chi tiết bình luận
        $commentController->deleteCommentDetails();
    }elseif(ACTION === 'add-banner'){ // thêm banner
        $bannerController->addBanner();
    }elseif(ACTION === 'edit-banner'){ // sửa banner 
        $bannerController->editBanner();
    }elseif(ACTION === 'update-banner'){ // cập nhật trạng thái banner
        $bannerController->updateBanner(); 
    }elseif(ACTION === 'delete-banner'){ // xóa banner
        $bannerController->deleteBanner();
    }elseif(ACTION === 'delete-email'){ // xóa email
        $emailController->deleteEmail();
    }elseif(ACTION === 'reply-email'){ // trả lời email
        $emailController->replyEmail();
    }elseif(ACTION === 'add-promotion'){ // thêm khuyến mãi
        $promotionController->addPromotion();
    }elseif(ACTION === 'edit-promotion'){ // sửa khuyến mãi
        $promotionController->editPromotion();
    }elseif(ACTION === 'update-promotion'){ // cập nhật trạng thái khuyến mãi
        $promotionController->updatePromotion();
    }elseif(ACTION === 'delete-promotion'){ // xóa khuyến mãi
        $promotionController->deletePromotion();
    }elseif(ACTION === 'add-blog'){ // thêm bài viét
        $blogController->addBlog();
    }elseif(ACTION === 'edit-blog'){ // sửa bài viết
        $blogController->editBlog();
    }elseif(ACTION === 'update-blog'){ // cập nhật trạng thái bài viết
        $blogController->updateBlog();
    }elseif(ACTION === 'delete-blog'){ // xóa bài viết
        $blogController->deleteBlog();
    }elseif(ACTION === 'add-color'){ // Thêm màu cho sp
        $productController->addColor();
    }elseif(ACTION === 'add-size'){ // Thêm size cho sp
        $productController->addSize();
    }elseif(ACTION === 'delete-productcolor'){
        $productController->deleteProductColor();
    }elseif(ACTION === 'delete-productsize'){
        $productController->deleteProductSize();
    }
}
/* --------------------------------- ACTION --------------------------------- */
?>
<!-- /* --------------------------------- ROUTER --------------------------------- */ -->
