<?php 
if(isset($dataOldBanner)){
    ?>
    <form class="input" action="?action=edit-banner&id=<?= (isset($_GET["id"])) ? $_GET["id"] : "" ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateAddBanner()">
        <h1>Sửa banner</h1>
        <label for="image">Ảnh</label>
        <input type="file" name="image" id="image">
        <input type="hidden" name="imageOld" value="<?= $dataOldBanner['image'] ?>">
        <label for="">URL</label>
        <input type="text" name="url" id="url" placeholder="Enter URL" value="<?= $dataOldBanner['url'] ?>">
        <label for="">Mô tả</label>
        <textarea name="description" id="description" cols="30" rows="10"><?= $dataOldBanner['description'] ?></textarea>
        <button name="edit-banner">Sửa banner</button>
    </form>
    <?php // HTML
}else{
    messRed("Chưa có banner nào");
}
?>
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Sửa thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=banners';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
