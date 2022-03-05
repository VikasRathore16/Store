$(".table-responsive").on("click", "#edit", function (e) {
    e.preventDefault();
    console.log($(this).data("userid"));
    $.ajax({
        method: "POST",
        url: "../../admin/Customers.php",
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
    $trid = "#" + $(this).data("userid");
    $.ajax({
        method: "POST",
        url: "../../admin/Customers.php",
        data: { id: $(this).data("userid"), action: "delete" },
        // dataType: "JSON"
    }).done(function (data) {
        
        console.log("success");

        console.log($($trid).remove());
        // cart(data);
    });
});

$(".table-responsive").on("click", ".btn", function (e) {
    e.preventDefault();
    $st =$(this).data('status')
  
    $.ajax({
        method: "POST",
        url: "../../admin/Customers.php",
        data: { id: $(this).data("userid"), action: "status" , status : $(this).data('status') },
        // dataType: "JSON",
    }).done(function (data) {
        location.reload();
        // if($st=='Restricted'){
        //     location.reload()
           
        // }
        // if($st=='Approved'){
        //     location.reload()
          
        // }
        console.log(data);
     
    });
});
