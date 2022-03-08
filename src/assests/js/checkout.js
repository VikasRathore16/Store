$(document).ready(function(){
    $('#orderCompleted').hide()
})


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
        data: { address: $('#address').val(), country : $('#country').val() , state : $('#state').val(), pincode : $('#pincode').val() },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        $('#orderCompleted').show();
        console.log(data);
        $('#checkout').hide();
        msg= display() 
        
        // cart(data);
    });
});

