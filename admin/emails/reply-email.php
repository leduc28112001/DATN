<a href="?room=emails" class="back"><i class="fa-solid fa-left-long"></i></a>
<form class="input" action="?action=reply-email&email=<?= (isset($_GET["email"])) ? $_GET["email"] : "" ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateReplyEmail()">
    <h1>Trả lời Email</h1>
    <label for="subject">Tiêu đề</label>
    <input type="text" name="subject" id="subject" placeholder="Enter Subject">
    <label for="message">Nội dung</label>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter Message"></textarea>
    <button name="reply">Trả lời</button>
</form>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Gửi mail thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=emails';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
