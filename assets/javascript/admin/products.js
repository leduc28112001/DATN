function validateAddProduct(){
    let categoryId = document.getElementById("categoryId");
    let image = document.getElementById("image");
    let productName = document.getElementById("productName");
    let price = document.getElementById("price");
    let quantity = document.getElementById("quantity");
    let description = document.getElementById("description");
    let details = document.getElementById("details");
    let valid = true;
    if(categoryId.value == 0){
        categoryId.style.borderColor = 'red';
        valid = false;
    }else{
        categoryId.style.borderColor = 'gray';
        valid = true;
    }
    if(image.value == 0){
        image.style.borderColor = 'red';
        valid = false;
    }else{
        image.style.borderColor = 'gray';
        valid = true;
    }
    if(productName.value == 0){
        productName.style.borderColor = 'red';
        valid = false;
    }else{
        productName.style.borderColor = 'gray';
        valid = true;
    }
    if(price.value == 0){
        price.style.borderColor = 'red';
        valid = false;
    }else{
        price.style.borderColor = 'gray';
        valid = true;
    }
    if(quantity.value == 0){
        quantity.style.borderColor = 'red';
        valid = false;
    }else{
        quantity.style.borderColor = 'gray';
        valid = true;
    }
    if(description.value == ""){
        description.style.borderColor = 'red';
        valid = false;
    }else{
        description.style.borderColor = 'gray';
        valid = true;
    }
    if(details.value == ""){
        details.style.borderColor = 'red';
        valid = false;
    }else{
        details.style.borderColor = 'gray';
        valid = true;
    }
    // if(!valid){
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: 'Not fully entered information!',
    //     });
    // }
    return valid;
}