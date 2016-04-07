
(function($) {

    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    })

    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })


    $("#create-new-category").click(function(event){
       
        event.preventDefault();
        var category = $("#new-category-name");
        if($(category).val() == ""){
             swal("Uh..Oh!", "Please enter a Category name", "error");
        }else{
            var btn = $("#create-new-category");
            var url = '/admin/create-new-category';
            var dataString = 'cname='+$(category).val();
            $(category).attr("disabled", true);
            $(btn).attr("disabled", true);
            $(btn).text("Please Wait...");
            callAjax("POST", url, dataString, function(response){
            if(response){
                $(category).attr("disabled", false);
                $(btn).attr("disabled", false);
                $(btn).text("Create a new Category");
                $("#create-new-event").trigger("reset");
                swal("Done!", "New Category Created", "success");
                window.location.reload();
            }else{
                $(category).attr("disabled", false);
                $(btn).attr("disabled", false);
                $(btn).text("Create a new Category");
                swal("Oops!", "Please try again", "error");
            }
            });     
        }
        
    });

    $( "#all-categories" ).change(function() {
     var options = $("#all-categories");
     var input = $("#category-name");
     if($(options).val() != "--"){
        $(input).attr("disabled", true);
        $(input).val("");
     }else{
        $(input).attr("disabled", false);
     }
    });

    $( "#category-name" ).change(function() {
     var options = $("#all-categories");
     var input = $("#category-name");
     if($(input).val()){
        $(options).attr("disabled", true);
        $(options).val("--")
     }else{
        $(options).attr("disabled", false);
     }
    });

    $(".subscribe").click(function(){
        var eventId = $(this).data('id');
        $(".subscribe-modal #eventId").val( eventId );
    });

    $("#save-subscriber").submit(function(event){
        event.preventDefault();
        var input = $("#subscribe-email");
        $.ajax({
                url: '/subscribe',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false, 
                beforeSend: function(request) {
                    $(input).prop('disabled', true);
                    $("#subscribe-btn").attr('disabled', true);
                    $(".text-for-subscribe-btn").text("Please wait...");
                 },
                 success: function(response){
                    $(input).prop('disabled', false);
                    $(".text-for-subscribe-btn").text("Subscribe");
                    $("#subscribe-btn").attr('disabled', false);
                    $('#subscribe').modal('hide');
                     swal("", response, "success");
                 },
                 error: function(error){
                    console.log(error);
                    $(input).prop('disabled', false);
                   $(".text-for-subscribe-btn").text("Subscribe");
                    $("#subscribe-btn").attr('disabled', false);
                   swal("Oops!", "Please try again", "error");
                 }
            });

    });

   

})(jQuery); 
