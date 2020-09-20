$(".nama-pasien").change(function(){
    $id = $(this).val();
    console.log($id);
    $.ajax({
        type: "GET",
        url: "http://localhost/FisioApp/public/get-datapasien?id=".$id,
        dataType: "json",
        success: function(response){
            console.log(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr, ajaxOptions, thrownError);
        }
    });
});
