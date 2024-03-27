<!-- /* -------------------------------- GIAO DIỆN ------------------------------- */ -->
<form action="?action=add-promotion" class="input" method="POST" onsubmit="return true">
    <h1>Thêm khuyến mãi</h1>
    <label for="">Tên khuyến mãi</label>
    <input type="text" id="promotionName" name="promotionName" placeholder="Nhập tên khuyến mãi">
    <label for="">Mô tả</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Nhập mô tả"></textarea>
    <label for="">Giảm (%)</label>
    <input type="number" id="percent" name="percent" placeholder="Nhập % giảm giá (nếu có)">
    <label for="">Ngày bắt đầu</label>
    <input type="date" id="startDate" name="startDate" placeholder="Ngày bắt đầu">
    <label for="">Ngày kết thúc</label>
    <input type="date" id="endDate" name="endDate" placeholder="Ngày kết thúc">
    <button name="add-promotion">Thêm khuyến mãi</button>
</form>
<!-- /* -------------------------------- GIAO DIỆN ------------------------------- */ -->
<!-- Xử lí hiển thị -->
<?= (isset($result) && $result === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Thêm thành công',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=promotions';}});</script>" : ""?>
<?= (isset($result) && $result === "Chưa nhập đầy đủ thông tin") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Chưa nhập đầy đủ thông tin!',});</script>" : "" ?>
<?= (isset($result) && $result === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->