$(document).ready(function() {

    $(".btn-success").click(function(){ 
        var html = $(".clone").html();
        $(".original").after(html);
    });

    $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".input-group").remove();
    });

  });
