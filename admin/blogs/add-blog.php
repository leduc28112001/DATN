<form class="input" action="?action=add-blog" method="POST" enctype="multipart/form-data" onsubmit="return true">
    <h1>Thêm blog</h1>
    <label for="image">Ảnh</label>
    <input type="file" name="image" id="image">
    <label for="">Tiêu đề</label>
    <input type="text" name="title" id="title" placeholder="Nhập tiêu đề">
    <label for="">Mô tả</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Mô tả"></textarea>
    <label for="">Nội dung</label>
    <textarea name="content" id="content-blog" cols="30" rows="10" placeholder="Nội dung"></textarea>
    <button name="add-blog">Thêm bài viết</button>
</form>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=blogs';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
