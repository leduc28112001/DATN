// Confirm Delete
function confirmDelete(url) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    } else {
      isValid = false;
    }
  });
  return false;
}
// Confirm Action
function confirmAction(url) {
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, continue!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    } else {
      isValid = false;
    }
  });
  return false;
}
