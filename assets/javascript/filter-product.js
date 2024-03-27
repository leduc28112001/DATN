document.addEventListener("DOMContentLoaded", ()=>{
  document.querySelectorAll(".filter-link").forEach(function (link) { // Lặp qua các link category
      link.addEventListener("click", function (event) { // Từng link sẽ ăn sự kiện
      event.preventDefault();
      var categoryId = this.getAttribute("data-category");
      var categoryName = this.textContent;
      
      // Hiển thị biểu tượng "Loading" trước khi gửi yêu cầu Ajax
      var loadingElement = document.getElementById("loading");
      loadingElement.style.display = "block";
      // Sử dụng AJAX để gửi yêu cầu
      var xhr = new XMLHttpRequest();
      xhr.open(
        "GET",
        "./handles/filter-product.php?&title=" + categoryName + "&categoryId=" + categoryId, true
      );
      xhr.onreadystatechange = function () {
          var productList = document.querySelector("article");
          if(xhr.readyState == 4 && xhr.status == 200) {
              // Cập nhật danh sách sản phẩm bằng dữ liệu từ máy chủ
              productList.innerHTML = xhr.responseText;
              loadingElement.style.display = "none";
          }
      };
      xhr.send();
    });
  });
});
