// Error
<script></script>
Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',});
// Success
Swal.fire({icon: 'success',title: 'Success',text: 'Code by Nghia',});
// Save
Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false, timer: 1500,});
// Header 2s
setTimeout(function () {window.location.href = 'https://example.com';}, 2000);
// Header
ok_để_chuyển_hướng_Có_thể_thêm_else.then((result) => { if (result.isConfirmed) {window.location.href = 'url';}});
hoặc_document.querySelector('form').submit();
// showCancelButton: true,
// allowOutsideClick: false,
// Thêm thành công - tiếp tục thêm hoặc ra ngoài xem
// <script>Swal.fire({icon: 'success',title: 'Success',text: 'Added category successfully',showCancelButton: true,cancelButtonText: 'Continute',confirmButtonText: 'View',}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=categories';}});</script>