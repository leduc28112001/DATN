<button class="add"><a href="?room=add-blog">Thêm bài viết</a></button>
<table style="width:100%;">
    <!-- XỬ LÍ HIỂN THỊ -->
    <?php 
    if(isset($blogs)){
        ?>
            <tr>
                <th>ID</th>
                <th>Mã người tạo</th>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            <?php 
            if(isset($blogs)){
                foreach ($blogs as $blog){
                    ?>
                    <tr>
                        <td><?= $blog['id'] ?></td>
                        <td><?= $blog['userId'] ?></td>
                        <td><img width="100px" src="../assets/image/<?= $blog['image'] ?>" alt=""></td>
                        <td><?= $blog['title'] ?></td>
                        <td><?= $blog['status'] ?></td>
                        <td class="actions">
                            <a href="?room=blogs&action=update-blog&status=display&id=<?= $blog['id'] ?>" class="black"><i class="fa-regular fa-eye"></i> Hiển thị</a>
                            <a href="?room=blogs&action=update-blog&status=hidden&id=<?= $blog['id'] ?>" class="black"><i class="fa-regular fa-eye-slash"></i> Ẩn</a>
                            <a href="?room=edit-blog&id=<?= $blog['id'] ?>" class="green"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                            <a onclick="return confirmDelete('?action=delete-blog&id=<?= $blog['id'] ?>&room=blogs')" href="" class="red"><i class="fa-solid fa-trash-can"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php // HTML
                }
            }
        }else{
            if(!isset($alertDelete) && !isset($alertUpdate)){
                messRed("Trống");
            }
        }
    ?>
    <!-- XỬ LÍ HIỂN THỊ -->
</table>
<!-- Xử lí hiển thị -->
<?= (isset($alertUpdate) && $alertUpdate === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Cập nhật thành công'}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=blogs';}});</script>" : ""?>
<?= (isset($alertUpdate) && $alertUpdate === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Thành công',text: 'Xóa thành công',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=blogs';}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Lỗi',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->
