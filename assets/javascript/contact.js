let sendMail = document.getElementById("sendMail");
sendMail.addEventListener("click", () => {
  let name = document.getElementById("name");
  let email = document.getElementById("email");
  let message = document.getElementById("message");
  let content = message.value;
  let isValid = true;

  if (name.value.trim() === "") {
    name.style.borderColor = "red";
    isValid = false;
  } else {
    name.style.borderColor = "gray";
    isValid = true;
  }
  if (email.value.trim() === "") {
    email.style.borderColor = "red";
    isValid = false;
  } else {
    email.style.borderColor = "gray";
    isValid = true;
  }
  if (content === "") {
    message.style.borderColor = "red";
    isValid = false;
  }
  if (!isValid) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Something went wrong!",
    });
  } else {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./handles/send-mail.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
      if (xhr.readyState === 4 && xhr.status === 200) {
        let result = xhr.responseText;
        if (result === "Thành công") {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Thank you, we will respond as soon as possible",
          });
          /* ---------------------------- RESET VALUE INPUT --------------------------- */
          name.value = "";
          email.value = "";
          message.value = "";
          message.style.borderColor = "gray";
          /* ---------------------------- RESET VALUE INPUT --------------------------- */
        } else if (result === "Chưa nhập đầy đủ thông tin") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Not fully entered information",
          });
        } else if (result === "Bạn chưa đăng nhập") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "You are not logged in",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "./auth/?auth=login";
            }
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
          });
        }
      }
    };
    xhr.send(
      "name=" + name.value + "&email=" + email.value + "&message=" + content
    );
  }
});