function set_device(id,value) {
    $.ajax({
        type: "POST",        
        url: "setdevice",
        data: {Device: { id: id, value: value}  },
        success: function (json_data) {
            var data = JSON.parse(json_data);
            if($.inArray("error",data) >= 0){
                console.log(data);
            }else{
                // tmp fix
                setTimeout(function(){window.location.href = "index"},1000);       
            }
        }
      })
}

$(function() {
    
    // Toggle extra data and update icon
    $( ".device_name" ).click(function() {
        detail = $(this).parent().parent().children(".device_info");
        if ( detail.is(":visible") ){
            $(this).children("i").removeClass("icon-chevron-up").addClass("icon-chevron-down");    
        }else{
            $(this).children("i").removeClass("icon-chevron-down").addClass("icon-chevron-up");
        }    
        detail.slideToggle();

    });

    // Switch device
    $(".switch_device > button").click(function() {
        device = $(this).parent().parent().parent();
        set_device(device.attr("id"), $(this).html());
    });

});



