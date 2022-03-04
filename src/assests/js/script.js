$(document).ready(function () {
    $("body").on("click", ".add-to-cart", function (e) {
        e.preventDefault();
        console.log($(this).data("id"));
        $.ajax({
            method: "GET",
            url: "operations.php",
            data: { id: $(this).data("id"), action: "add" },
            dataType: "JSON",
        }).done(function (data) {
            console.log(data);
            cart(data);
        });
    });

});