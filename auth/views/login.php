<div id="form-auth">
    <form action="?action=login" method="POST" onsubmit="return validateLogin()">
        <h1>Đăng nhập</h1>
        <label for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="Nhập Email">
        <label for="password">Mật khẩu</label>
        <input name="password" type="password" id="password" placeholder="Nhập mật khẩu">
        <button name="login">Tiếp tục</button>
        <div class="more-form">
            <span>Bạn chưa là thành viên?</span>
            <a href="?auth=register">Đăng ký</a>
        </div>
        <div class="more-form">
            <a href="?auth=forgot-password" class="forgotpassword">Quên mật khẩu?</a>
        </div>
        <div class="more-form">
            <a href="../" class="back-web">Trở lại trang web</a>
        </div>
        <!-- Có thể thêm các cách đăng nhập khác như Facebook, Google ...(bằng các ô input) -->
    </form>
</div>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Tài khoản của bạn chưa được kích hoạt") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản của bạn chưa được kích hoạt!',});</script>" : "" ?>
<?= (isset($result) && $result === "Tài khoản của bạn đã bị vô hiệu hóa") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản của bạn đã bị vô hiệu hóa!',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản chưa được đăng ký") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản chưa được đăng ký!',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản của bạn bị lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản của bạn bị lỗi!',});</script>" : "" ?>
<?= (isset($result) && $result === "Mật khẩu sai") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Mật khẩu sai!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->