<div id="form-auth">
    <form action="?action=forgot-password" method="POST" onsubmit="return validateForgotPassword()">
        <h1>Quên mật khẩu</h1>
        <label for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="Nhập Email">
        <button name="submit">Tiếp tục</button>
        <div class="more-form">
            <span>Bạn đã là thành viên?</span>
            <a href="?auth=login">Đăng nhập</a>
        </div>
        <div class="more-form">
            <a href="../" class="back-web">Trở lại trang web</a>
        </div>
    </form>
</div>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Kiểm tra hộp thư để thay đổi mật khẩu mới',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản của bạn chưa được kích hoạt") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản của bạn chưa được kích hoạt!',});</script>" : "" ?>
<?= (isset($result) && $result === "Tài khoản của bạn đã bị vô hiệu hóa") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản của bạn đã bị vô hiệu hóa!',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản chưa được đăng ký") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản chưa được đăng ký!',});</script>" : ""?>
<?= (isset($result) && $result === "Tài khoản của bạn bị lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Tài khoản của bạn bị lỗi!',});</script>" : "" ?>
<?= (isset($result) && $result === "Mật khẩu sai") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Mật khẩu sai!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->