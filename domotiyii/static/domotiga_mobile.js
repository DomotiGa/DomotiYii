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
		} else { error = true; }   

		if(error){
			// Both buttons inactive
			device.find("#but-off").removeClass('ui-btn-active ui-state-persist');
			device.find("#but-on").removeClass('ui-btn-active ui-state-persist');			
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
			// Write error message
			this.find(".device_error").html('Error; ' + textStatus);
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

		if(device_value.indexOf("On") !== -1){
			device_value_number = 100;
		}else if(device_value.indexOf("Off") !== -1){
			device_value_number = 0;
		}
		
		// Set slider value
		$('#slider' +device.data("id")).val(device_value_number).slider("refresh");
		
		if(device_value_number > 0 && device_value_number <= 100){		
			device.find("#but-on").addClass('ui-btn-active ui-state-persist');
			device.find("#but-off").removeClass('ui-btn-active ui-state-persist');
		}else{
			device.find("#but-off").addClass('ui-btn-active ui-state-persist');
			device.find("#but-on").removeClass('ui-btn-active ui-state-persist');			
		}
	});   
}

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
				// parse data, loop through each device
				$.each( json_data.result,function() {
					var device = $(".device[data-id="+this.device_id+"]");
					//device.find(".device_lastseen").html('Lastseen:' + this.lastseen);
					// loop through each device value
					$.each( this.values,function() {
						var device_value = device.find(".device_value_"+this.valuenum);
						if (this.valuenum == 1){
						  device.find(".device_status").html(this.value + " " + this.units);
						}
						if (this.valuenum == 2 && this.value != " "){
						  device.find(".device_value_2").html("<b>Value2:</b> " + this.value + " " + this.units + "<br/>");
						}
						if (this.valuenum == 3 && this.value != " "){
						  device.find(".device_value_3").html("<b>Value3:</b> " + this.value + " " + this.units + "<br/>");
						}
						if (this.valuenum == 4 && this.value != " "){
						  device.find(".device_value_4").html("<b>Value4:</b> " + this.value + " " + this.units + "<br/>");
						}
					 })
				})
			}
		}else{ error = true; }   

		if(error){
			// Write error message
			this.find(".device_error").html('Error; ' + textStatus);
		}else{
			update_control();    
		}  
		window.setTimeout(getDeviceUpdates, window.refreshMobile);
  })        
}

function refreshPage() {
	// Refresh page with parameters
	if ($('#type').val() == 'All' && $('#location').val() == 'All') {
		window.location.href = "http://" + window.location.host + window.location.pathname ;
	} else if ($('#type').val() == 'All') {
		window.location.href = "http://" + window.location.host + window.location.pathname + '?location=' + $('#location').val() ;
	} else if ($('#location').val() == 'All') {
		window.location.href = "http://" + window.location.host + window.location.pathname + '?type=' + $('#type').val() ;
	} else {
		var params = ["type=" + $('#type').val(),"location=" + $('#location').val()];
		window.location.href = "http://" + window.location.host + window.location.pathname + '?' + params.join('&') ;	
	}
}
	
///////////////////////////////////////////////////////////////////
// The click listeners

//Location select from parameter
$("#location option[value='"+ GetURLParameter('location') +"']").attr('selected', 'selected');  
$('#location').selectmenu('refresh');

//Type select from parameter
$("#type option[value='"+ GetURLParameter('type') +"']").attr('selected', 'selected');  
$('#type').selectmenu('refresh');

//Location select
$('#location').on('change', function(e) {
 refreshPage();
});

//Type select
$('#type').on('change', function() {
  refreshPage();
});

// Get slider dim value
$("[id^=slider]").on("slidestop", function(event, ui){
   device_value = $('#'+ $(this).attr('id')).val();
   device = $(this).parents(".device");
   
	if(device_value == 0){
		device_value = "Off";
	}else if(device_value == 100){
		device_value = "On";
	}else{
		device_value= "Dim " + device_value;
	}
	
	//alert(device_value + ' - ' + device.data("id"));
	set_device(device.data("id"), device_value); 
});

// Switch device
$('div[data-role="navbar"] ul li a').on('click', function () {
	device_value = $(this).html();
	device = $(this).parents(".device");
	
	if(device_value.indexOf("On") !== -1){
		//alert("On clicked " + device.data("id"));
		device_value = "On";
	}else{
		//alert("Off clicked " + device.data("id"));
		device_value = "Off";
	}
	set_device(device.data("id"), device_value);
});

// Run scene
$("[id^=run]").click(function() {
	scene = $(this).parents(".scene");
	//alert(scene.data("id"));
	run_scene(scene.data("id"));
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


