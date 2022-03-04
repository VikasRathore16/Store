$(document).ready(function () {
    $(".table-responsive").on("click", "#edit", function (e) {
        e.preventDefault();
        console.log($(this).data("userid"));
        // $.ajax({
        //     method: "GET",
        //     url: "operations.php",
        //     data: { id: $(this).data("id"), action: "add" },
        //     dataType: "JSON",
        // }).done(function (data) {
        //     console.log(data);
        //     cart(data);
        // });
    });

    $(".table-responsive").on("click", "#edit", function (e) {
        e.preventDefault();
        console.log($(this).data("userid"));
        // $.ajax({
        //     method: "GET",
        //     url: "operations.php",
        //     data: { id: $(this).data("id"), action: "add" },
        //     dataType: "JSON",
        // }).done(function (data) {
        //     console.log(data);
        //     cart(data);
        // });
    });

    $(".table-responsive").on("click", "#delete", function (e) {
        e.preventDefault();
        console.log($(this).data("userid"));
        // $.ajax({
        //     method: "GET",
        //     url: "operations.php",
        //     data: { id: $(this).data("id"), action: "add" },
        //     dataType: "JSON",
        // }).done(function (data) {
        //     console.log(data);
        //     cart(data);
        // });
    });

    $(".table-responsive").on("click", "#delete", function (e) {
        e.preventDefault();
        console.log($(this).data("userid"));
        // $.ajax({
        //     method: "GET",
        //     url: "operations.php",
        //     data: { id: $(this).data("id"), action: "add" },
        //     dataType: "JSON",
        // }).done(function (data) {
        //     console.log(data);
        //     cart(data);
        // });
    });

});