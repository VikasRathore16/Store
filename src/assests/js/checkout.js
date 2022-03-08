$(".form").on("click", "#formSubmit", function (e) {
    e.preventDefault();
    console.log('hello');
    console.log($('#username').val())
    checkUser = $('#username').val();
    cartItems = $('#cartItems').val();
    if(checkUser=='user not exists'){
        alert('You have to login first')
        window.location = '../../admin/index.php';
    }
    if(cartItems==0){
        alert('First add some products in cart for checkout')
        window.location = '../../index.php';
    }
    $.ajax({
        method: "POST",
        url: "../../Store/placeOrder.php",
        data: { id: $(this).data("userid"), action: "edit" },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        console.log(data);
        // cart(data);
    });
});

