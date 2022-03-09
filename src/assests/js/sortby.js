$("#inlineFormSelectPref").on("click", function (e) {
    e.preventDefault();
    val = $(this).val();
    $.ajax({
        method: "POST",
        url: "../../Store/sortby.php",
        data: { value: val , action: "sortby" },
        // dataType: "JSON",
    }).done(function (data) {
        console.log("success");
        console.log(data);
        window.location ='../../Store/sortby.php?parameter='+val;
        // cart(data);
    });
});

