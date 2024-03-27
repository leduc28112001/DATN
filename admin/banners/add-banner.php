<form class="input" action="?action=add-banner" method="POST" enctype="multipart/form-data" onsubmit="return validateAddBanner()">
    <h1>Thêm banner</h1>
    <label for="image">Ảnh</label>
    <input type="file" name="image" id="image">
    <label for="">URL</label>
    <input type="text" name="url" id="url" placeholder="Nhập URL">
    <label for="">Mô tả</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <button name="add-banner">Thêm banner</button>
</form>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=banners';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
