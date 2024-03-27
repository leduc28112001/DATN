document.addEventListener("DOMContentLoaded", ()=>{
    let keyword = document.getElementById("keyword");
    let search = document.getElementById("search");
    search.addEventListener("click", () => {
        if(keyword.value !== ""){
            keyword.style.borderColor = "white";
            // Hiển thị biểu tượng "Loading" trước khi gửi yêu cầu Ajax
            let loadingElement = document.getElementById("loading");
            loadingElement.style.display = "block";
            let xhr = new XMLHttpRequest();
            xhr.open(
                "GET",
                "./handles/search.php?&title=search" + "&keyword=" + keyword.value, true 
            );
            xhr.onreadystatechange = () =>{
                let result = document.querySelector("article");
                if(xhr.readyState === 4 && xhr.status === 200){
                    result.innerHTML = xhr.responseText;
                    loadingElement.style.display = "none";
                }
            };
            xhr.send();
        }else{
            keyword.style.borderColor = "red";
        }
    });
    
    
    // CÓ THỂ GỘP 2 HÀM LẠI THÔNG QUA VIỆC TRUYỀN THAM SỐ
    
    
    let keyword_mobile = document.getElementById("keyword_mobile");
    let search_mobilde = document.getElementById("search_mobile");
    search_mobilde.addEventListener("click", () => {
        if(keyword_mobile.value !== ""){
            keyword_mobile.style.borderColor = "white";
            // Hiển thị biểu tượng "Loading" trước khi gửi yêu cầu Ajax
            let loadingElement = document.getElementById("loading");
            loadingElement.style.display = "block";
            let xhr = new XMLHttpRequest();
            xhr.open(
                "GET",
                "./handles/search.php?&title=search" + "&keyword=" + keyword_mobile.value, true 
            );
            xhr.onreadystatechange = () =>{
                let result = document.querySelector("article");
                if(xhr.readyState === 4 && xhr.status === 200){
                    result.innerHTML = xhr.responseText;
                    loadingElement.style.display = "none";
                }
            };
            xhr.send();
        }else{
            keyword_mobile.style.borderColor = "red";
        }
    });
});