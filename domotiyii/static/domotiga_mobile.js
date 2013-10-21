function set_device(id,value) {
    $.ajax({
        type: "POST",        
        url: "setdevice",
        data: {Device: { id: id, value: value}  },
        success: function (json_data) {
            var data = JSON.parse(json_data);
            if($.inArray("error",data) >= 0){
                console.log(data);
                $("#" + id + " .switch_device > button").removeClass("btn-primary").addClass("btn-danger");
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
        $(this).parent().children("button").removeClass("btn-primary");
        $(this).addClass("btn-primary");
        device_value = $(this).html();
        device = $(this).parent().parent().parent();
        device.find(".device_status").html(device_value);
        set_device(device.attr("id"), device_value);
    });

});



