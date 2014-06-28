$(function() {

    // If no refresh rate is set set a fallback value of 5 seconds
    window.refreshMobile = window.refreshMobile || 5000;

    // Set a device by sending id and value to the server
    // Finnaly check on result: 
    // If failed set the buttons and slider to red. 
    function set_device(id,value) {
        $.ajax({
            type: "POST",        
            url: "setdevice",
            data: {Device: { id: id, value: value}  }
        }).always( function (json_data, textStatus, errorThrown) {
            var error = false;            
            if (textStatus == "success"){
                if((json_data.result != undefined && !json_data.result ) || json_data.error != undefined){
                    error = true;
                }
            }else{ error = true; }   

            if(error){
                $(".device[data-id=" + id + "] .switch_device > button").removeClass("btn-primary").addClass("btn-danger");
                $(".device[data-id=" + id + "] .slider-handle").addClass("slider-handle-error");
            }  
      })
    }
    
    // Start a scene by id
    // Finnaly check on result: 
    // If failed set the button to red. 
    function run_scene(id) {
        $.ajax({
            type: "POST",        
            url: "runscene",
            data: {Scene: { id: id}  }
        }).always( function (json_data, textStatus, errorThrown) {
            var error = false;            
            if (textStatus == "success"){
                if((json_data.result != undefined && !json_data.result ) || json_data.error != undefined){
                    error = true;
                }
            }else{ error = true; }   

            if(error){
                $(".scene[data-id=" + id + "] > button").removeClass("btn-primary").addClass("btn-danger");
            }  
      })
    }

    // Handle for all on/off buttons and slider that the are in sync with its value.
    function update_control(){
        // handle start values
        $(".device").each(function (){ 
            device = $(this);
            device_value = device.find(".device_status").html();
            device_value_number = device_value.replace(/[^\d.]/g,'');
        
            if(device_value.indexOf("On") !==-1){
                device_value_number = 100;
            }else if(device_value.indexOf("Off") !==-1){
                device_value_number = 0;
            }
            
            device.find(".slider input").slider('setValue', device_value_number); 
            if(device_value_number > 0 && device_value_number <= 100){
                device.find("button").removeClass("btn-primary");
                device.find("button:nth-child(2)").addClass("btn-primary");      
            }else{
                device.find("button").removeClass("btn-primary");
                device.find("button:nth-child(1)").addClass("btn-primary"); 
            }
        });   
    }
    
    // Update frequently the status of the devices.
    // Finnaly check on result: 
    // If failed set the button to red. 
    function getDeviceUpdates(){
        $.ajax({
            type: "GET",        
            url: "getdeviceupdate",
            data: {location: GetURLParameter("location") }
        }).always( function (json_data, textStatus, errorThrown) {
            var error = false;            
            if (textStatus == "success"){
                if(json_data.result == undefined || json_data.result == false || json_data.error != undefined){
                    error = true;
                }else{
                    // parse data, loop trough each device
                    $.each( json_data.result,function() {
                        var device = $(".device[data-id="+this.device_id+"]");
                        device.find(".device_lastseen").html('<i class="icon-time"></i>' + this.lastseen);
                        // loop trough each device value
                        $.each( this.values,function() {
                            var device_value = device.find(".device_value_"+this.valuenum);
                            if (this.valuenum == 1){
                              device.find(".device_status").html(this.value + " " + this.units);
                            }
                            
                            if ((this.value + this.units).length > 0){
                              if(device_value.length == 0){
                                device.find(".device_info_value").append('<p class="device_value_'+this.valuenum+'">');
                              }
                              device.find(".device_value_"+this.valuenum).html('<i class="icon-tag"></i>' +this.value + " " + this.units);
                            }else{
                              device.remove(".device_value_"+this.valuenum);
                            }
                         })
                    })
                }
            }else{ error = true; }   

            if(error){
                $(".switch_device > button").removeClass("btn-primary").addClass("btn-danger");
                $(".slider-handle").addClass("slider-handle-error");
            }else{
                update_control();    
            }  
            window.setTimeout(getDeviceUpdates, window.refreshMobile);
      })        
    }

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

    // The click listeners

    // Run scene
    $(".scene button").click(function() {
        scene = $(this).parents(".scene");
        run_scene(scene.data("id"));
    });

    // Switch device
    $(".switch_device > button").click(function() {
        device_value = $(this).html();
        device = $(this).parents(".device");
        device.find("button").removeClass("btn-primary");
        $(this).addClass("btn-primary");
        
        if(device_value.indexOf("On") !==-1){
            device.find(".slider input").slider('setValue', 100);
        }else{
            device.find(".slider input").slider('setValue', 0);
        }

        device.find(".device_status").html(device_value);
        set_device(device.data("id"), device_value);
    });

    // dim device
    $('.slider').slider()
        .on('slideStop', function(ev){
            device_value = ev.value;
            device = $(this).parents(".device");

            if( (device_value > 0 && device_value <= 100)){
                device.find("button").removeClass("btn-primary");
                device.find("button:nth-child(2)").addClass("btn-primary");                
            }else{
                device.find("button").removeClass("btn-primary");
                device.find("button:nth-child(1)").addClass("btn-primary"); 
            }

            if(device_value == 0){
                device_value = "Off";
            }else if(device_value == 100){
                device_value = "On";
            }else{
                device_value= "Dim " + device_value;
            }
            
            device.find(".device_status").html(device_value);
            set_device(device.data("id"), device_value);   
        });


    //start system
    update_control();
    getDeviceUpdates();

});


// http://jquerybyexample.blogspot.com/2012/06/get-url-parameters-using-jquery.html
function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
};


