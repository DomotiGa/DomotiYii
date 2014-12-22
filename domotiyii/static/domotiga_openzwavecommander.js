// If no refresh rate is set set a fallback value of 5 seconds
window.refreshOpenZwaveCommander = window.refreshOpenZwaveCommander || 5000;
window.heartbeat = 0;

// start openzwave
function start_openzwave() {
    if(openzwavelist != undefined && openzwavelist.count >= 1 ){
        getZwaveController();
    }
}


function getZwaveController(){
    $.ajax({
        type: "GET",        
        url: "GetController",
        data: { instance_id: openzwavelist.instance_id[0]  }
    }).always( function (json_data, textStatus, errorThrown) {
        var error = false;            
        if (textStatus == "success"){
            if(json_data.result == undefined || json_data.result == false || json_data.error != undefined){
                error = true;
            }
        }else{ error = true; }   

        // update heartbeat info
        window.heartbeat = window.heartbeat + 1;
        $("#heartbeat .badge").html(window.heartbeat);

        if(error){
            $("#heartbeat").removeClass("btn-success").addClass("btn-danger");
        }else{
            $("#heartbeat").removeClass("btn-danger").addClass("btn-success");
            if(json_data.result.allqueried){
                $("#status").removeClass("btn-warning").addClass("btn-success")
                $("#status .badge").html("");            
            }else{
                $("#status").removeClass("btn-success").addClass("btn-warning");
                $("#status .badge").html("Not Fully Initialized");            
            }

            cleanupDevices(json_data.result.nodeinfo);

    
            parseStatistics(json_data.result.statistics);
            parseNodeInfo(json_data.result.nodeinfo);
        }  

        window.setTimeout(getZwaveController, window.refreshOpenZwaveCommander);

      })
}

function cleanupDevices(nodeInfo){
    var devices = new Array();

    $.each( nodeInfo,function() {
        devices.push(this.node_id);
    });
    
    $(".devices tr").each(function() {
        var id = $(this).data("id");
        if(id != undefined){
            if($.inArray(id, devices)==-1){
                this.remove();
            }
        }
    });

}


function parseStatistics(statistics){
    $("#sendPackets .badge").html(statistics.write);
    $("#recivedPackets .badge").html(statistics.read);
}

function parseNodeInfo(nodeInfo){
    $.each( nodeInfo,function() {
        var device = $(".devices").find("#device_"+this.node_id);        
        if(device.length == 0){
            $(".devices tbody") .append('<tr data-id="'+this.node_id+'" id="device_'+this.node_id+'"> \
                                    <td>'+this.node_id+'</td> \
                                    <td>'+this.specific+'</td> \
                                    <td class="state">'+this.state+'</td> \
                                    <td class="manufacturername">'+this.manufacturername+'</td> \
                                    <td class="productname">'+this.productname+'</td> \
                                    <td class="lastseen">'+this.lastseen+'</td> \
                                  </tr>');
            device = $(".devices").find("#device_"+this.node_id);
        }

        // update info
        device.find(".state").html(this.state);
        device.find(".manufacturername").html(this.manufacturername);
        device.find(".productname").html(this.productname);
        device.find(".lastseen").html(this.lastseen);
          
     });

}


$(function() {


    // Include Node
    $("#includenode").click(function() {

        $("#includenode").removeClass("btn-success").removeClass("btn-danger");

        $.ajax({
            type: "POST",        
            url: "IncludeNode",
            data: { instance_id: openzwavelist.instance_id[0]  }
        }).always( function (json_data, textStatus, errorThrown) {
            var error = false;            
            if (textStatus == "success"){
                if(json_data.result == undefined || json_data.result == false || json_data.error != undefined){
                    error = true;
                }
            }else{ error = true; }   
    
            if(error){
                $("#includenode").addClass("btn-danger");
            }else{
                $("#includenode").addClass("btn-success");
            }
 
      })

    });

    // Exclude Node
    $("#excludenode").click(function() {

        $("#excludenode").removeClass("btn-success").removeClass("btn-danger");

        $.ajax({
            type: "POST",        
            url: "ExcludeNode",
            data: { instance_id: openzwavelist.instance_id[0]  }
        }).always( function (json_data, textStatus, errorThrown) {
            var error = false;            
            if (textStatus == "success"){
                if(json_data.result == undefined || json_data.result == false || json_data.error != undefined){
                    error = true;
                }
            }else{ error = true; }   
    
            if(error){
                $("#excludenode").addClass("btn-danger");
            }else{
                $("#excludenode").addClass("btn-success");
            }
 
      })

    });

    // Cancel command
    $("#cancelcommand").click(function() {

        $("#cancelcommand").removeClass("btn-success").removeClass("btn-danger");

        $.ajax({
            type: "POST",        
            url: "CancelCommand",
            data: { instance_id: openzwavelist.instance_id[0]  }
        }).always( function (json_data, textStatus, errorThrown) {
            var error = false;            
            if (textStatus == "success"){
                if(json_data.result == undefined || json_data.result == false || json_data.error != undefined){
                    error = true;
                }
            }else{ error = true; }   
    
            if(error){
                $("#cancelcommand").addClass("btn-danger");
            }else{
                $("#cancelcommand").addClass("btn-success");
            }
 
      })

    });

    // Cancel command
    $("#healcommand").click(function() {

        $("#healcommand").removeClass("btn-success").removeClass("btn-danger");

        $.ajax({
            type: "POST",        
            url: "Healnetwork",
            data: { instance_id: openzwavelist.instance_id[0]  }
        }).always( function (json_data, textStatus, errorThrown) {
            var error = false;            
            if (textStatus == "success"){
                if(json_data.result == undefined || json_data.result == false || json_data.error != undefined){
                    error = true;
                }
            }else{ error = true; }   
    
            if(error){
                $("#healcommand").addClass("btn-danger");
            }else{
                $("#healcommand").addClass("btn-success");
            }
 
      })

    });


});
