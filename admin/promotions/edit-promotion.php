<!-- /* -------------------------------- GIAO DIỆN ------------------------------- */ -->
<form action="?action=edit-promotion&id=<?= $_GET["id"] ?>" class="input" method="POST" onsubmit="return true">
    <h1>Sửa khuyến mãi</h1>
    <label for="">Tên khuyến mãi mới</label>
    <input type="text" id="promotionName" name="promotionName" value="<?= $dataOldPromotion['promotionName'] ?>" placeholder="Nhập tên khuyến mãi">
    <label for="">Mô tả mới</label>
    <textarea name="description" id="description" cols="30" rows="10"><?= $dataOldPromotion['description'] ?></textarea>
    <label for="">Giảm (%)</label>
    <input type="text" id="percent" name="percent" value="<?= $dataOldPromotion['percent'] ?>" placeholder="Nhập % giảm giá (nếu có)">
    <label for="">Ngày bắt đầu mới</label>
    <input type="date" id="startDate" name="startDate" value="<?= $dataOldPromotion['startDate'] ?>">
    <label for="">Ngày kết thúc mới</label>
    <input type="date" id="endDate" name="endDate" value="<?= $dataOldPromotion['endDate'] ?>">
    <button name="edit-promotion">Sửa khuyến mãi</button>
</form>
<!-- /* -------------------------------- GIAO DIỆN ------------------------------- */ -->
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Sửa thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=promotions';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
