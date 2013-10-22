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
        detail = $(this).parents(".device").children(".device_info");
        if ( detail.is(":visible") ){
            $(this).children("i").removeClass("icon-chevron-up").addClass("icon-chevron-down");    
        }else{
            $(this).children("i").removeClass("icon-chevron-down").addClass("icon-chevron-up");
        }    
        detail.slideToggle();

    });

    // Switch device
    $(".switch_device > button").click(function() {
        device_value = $(this).html();
        device = $(this).parents(".device");
        device.find("button").removeClass("btn-primary");
        $(this).addClass("btn-primary");
        
        if(device_value == "On"){
            device.find(".slider input").slider('setValue', 100);
        }else{
            device.find(".slider input").slider('setValue', 0);
        }

        device.find(".device_status").html(device_value);
        set_device(device.attr("id"), device_value);
    });

    $('.slider').slider()
        .on('slideStop', function(ev){
            device_value = ev.value;
            device = $(this).parents(".device");

            if( (device_value > 0 && device_value <= 100)){
                device.find("button").removeClass("btn-primary");
                device.find("button:nth-child(1)").addClass("btn-primary");                
            }else{
                device.find("button").removeClass("btn-primary");
                device.find("button:nth-child(2)").addClass("btn-primary"); 
            }

            if(device_value == 0){
                device_value = "Off";
            }else if(device_value == 100){
                device_value = "On";
            }else{
                device_value= "Dim " + device_value;
            }
            
            device.find(".device_status").html(device_value);
            set_device(device.attr("id"), device_value);   
        });

});



