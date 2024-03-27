<?php 
if(isset($dataOldBlog)){
    ?>
    <form class="input" action="?action=edit-blog&id=<?= (isset($_GET["id"])) ? $_GET["id"] : "" ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateAddBanner()">
        <h1>Sửa blog</h1>
        <label for="image">Ảnh</label>
        <input type="file" name="image" id="image">
        <input type="hidden" name="imageOld" value="<?= $dataOldBlog['image'] ?>">
        <label for="">Tiêu đề</label>
        <input type="text" name="title" id="title" placeholder="Nhập tiêu đề" value="<?= $dataOldBlog['title'] ?>">
        <label for="">Mô tả</label>
        <textarea name="description" id="description" cols="30" rows="10"><?= $dataOldBlog['description'] ?></textarea>
        <label for="">Nội dung</label>
        <textarea name="content" id="content-blog" cols="30" rows="10"><?= $dataOldBlog['content'] ?></textarea>
        <button name="edit-blog">Chỉnh sửa</button>
    </form>
    <?php // HTML
}else{
    messRed("Chưa có bài viết nào");
}
?>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Sửa thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=blogs';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
