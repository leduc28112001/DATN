document.addEventListener("DOMContentLoaded", ()=>{
    let max_qtt = parseInt(document.getElementById("max-qtt").value);
    let down_qtt = document.getElementById("down-qtt");
    let up_qtt = document.getElementById("up-qtt");
    let quantity_add_cart = parseInt(document.getElementById("quantity_add_cart").value);
    up_qtt.addEventListener("click", ()=>{
        if(quantity_add_cart >= max_qtt){
            Swal.fire({icon: 'error',title: 'Oops...',text: 'Oops...',text: 'There are only ' + max_qtt + ' left of the product!',});
        }else{
            quantity_add_cart ++;
            document.getElementById('quantity_add_cart').value = quantity_add_cart;
        }
    });
    down_qtt.addEventListener("click", ()=>{
        if(quantity_add_cart > 1){
            quantity_add_cart --;
            document.getElementById('quantity_add_cart').value = quantity_add_cart;
        }
    });
});