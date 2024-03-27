let imageMain = document.getElementById("imageMain");
let quantitySubImage = document.getElementById("quantitySubImage").value;
for(let i = 0; i < quantitySubImage; i++) {
    function nextImage(i){
        imageMain.src = document.getElementById("nextImageMore"+i).src;
    }
}
/* ----------------------------- Chỉnh sửa 29/01 ẢNH THEO MÀU ---------------------------- */
var colors = document.querySelectorAll('input[name="color"]');
colors.forEach(color => {
    color.addEventListener("change", () => {
        if (color.checked) {
            imageMain.src = color.value; // Đặt tên ảnh tương ứng với giá trị của radio
        }
    });
});
/* ----------------------------- Chỉnh sửa 29/01 ẢNH THEO MÀU ---------------------------- */
