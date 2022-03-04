$(".table-responsive").on("click", "#edit", function (e) {
    e.preventDefault();
    console.log($(this).data("userid"));
    $.ajax({
        method: "POST",
        url: "../../admin/Products.php",
        data: { id: $(this).data("userid"), action: "edit" },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        console.log(data);
        // cart(data);
    });
});



$(".table-responsive").on("click", "#delete", function (e) {
    e.preventDefault();
    $trid = "#" + $(this).data("productid");
    $.ajax({
        method: "POST",
        url: "../../admin/Products.php",
        data: { id: $(this).data("productid"), action: "delete" },
        // dataType: "JSON"
    }).done(function (data) {
        console.log(data);
        console.log("success");

        console.log($($trid).remove());
        // cart(data);
    });
});