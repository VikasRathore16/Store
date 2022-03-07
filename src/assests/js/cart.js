$(".single-product-area").on("click", "#addToCart", function (e) {
    e.preventDefault();
    console.log($(this).data("product_id"));
  
    $.ajax({
        method: "POST",
        url: "../../Store/operations.php",
        data: { product_id: $(this).data("product_id"), action: "add" },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        console.log(data);
       
    });
});


$(".table").on("click", "#Remove", function (e) {
    e.preventDefault();
    console.log($(this).data("product_id"));
  
    $.ajax({
        method: "POST",
        url: "../../Store/operations.php",
        data: { product_id: $(this).data("product_id"), action: "Remove" },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        console.log(data);
        location.reload();
    
    });
});

$(".table").on("click", "#update", function (e) {
    e.preventDefault();
    console.log($(this).data("product_id"));
    id=$(this).data('product_id')
    console.log($("#update"+id).val());
    $.ajax({
        method: "POST",
        url: "../../Store/operations.php",
        data: { product_id: $(this).data("product_id"), action: "update" , quantity : $("#update"+id).val() },
        // dataType: "JSON",
    }).done(function (data) {
        console.log('hello');
        window.location.reload();
        // location.reload();
        
    });
});