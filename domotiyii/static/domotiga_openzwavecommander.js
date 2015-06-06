// ===========================
// Settings
// ===========================

// If no refresh rate is set set a fallback value of 5 seconds
window.refreshOpenZwaveCommander = window.refreshOpenZwaveCommander || 5000;
window.heartbeat = 0;
window.node_id = 0;


// ===========================
// Listeners
// ===========================

$(document).on("click", "#includenode", includenode);
$(document).on("click", "#excludenode", excludenode);
$(document).on("click", "#cancelcommand", cancelcommand);
$(document).on("click", "#healcommand", healcommand);
$(document).on("click", ".devices tbody tr", showDevice);
$(document).on("change", "#device .config td select", updateDeviceConfigListSelect);
$(document).on("input", "#device .config td input", updateDeviceConfigListInput);
$(document).on("click", "#device #basicreport", basicreportCommand);

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
        if (textStatus != "success" || json_data.result == undefined || json_data.result == false || json_data.error != undefined){
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

        updateHeartbeat();
        window.setTimeout(getZwaveController, window.refreshOpenZwaveCommander);

      })
}

function parseStatistics(statistics){
    $("#sendPackets .badge").html(statistics.write);
    $("#recivedPackets .badge").html(statistics.read);
}

function parseNodeInfo(nodeInfo){
    $.each( nodeInfo,function() {
        var device = $(".devices").find("#device_"+this.node_id);        
        if(device.length == 0){
            $(".devices tbody").append('<tr data-id="'+this.node_id+'" id="device_'+this.node_id+'"> \
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

        if(window.node_id == this.node_id){
            displayNodeInfo(this);
        }

    });

}

function displayNodeInfo(node){
    $("#device .info .id td").html(node.node_id);
    $("#device .info .lastseen td").html(node.lastseen);
    $("#device .info .neighbors td").html(node.neighbors);


    var groups =  $("#device .groups");


    $.each(node.group, function() {

        var group = groups.find("#group_"+this.group);
        if(group.length == 0){
            $("#device .groups tbody").append('<tr data-id="'+this.group+'" id="group_'+this.group+'"> \
                    <th>' + this.group + ' - ' +this.label+'</th> \
                    <td></td> \
                  </tr>');
            group = groups.find("#group_"+this.group);
        }

        association = "";
        $.each(this.association, function() {
          association += this+',';
        })
        group.find("td").html(association);

    })


    var configs = $("#device .config");

    if(node.config == undefined){
        return true;
    }

    $.each(node.config, function() {

        var config = configs.find("#config_"+this.index);
        if(config.length == 0){
            $("#device .config tbody").append('<tr data-id="'+this.index+'" id="config_'+this.index+'"> \
                    <th>' + this.index + ' - ' +this.label+'</th> \
                    <td></td> \
                  </tr>');
            config = configs.find("#config_"+this.index);

            if(this.type == "list") {
                options = "<select>";
                $.each(this.list, function() {
                    options += '<option value="'+this+'">'+this+'</option>';
                })
                options += "</select>";
                config.find("td").html(options);
            } else if(this.type == "short" || this.type == "byte" || this.type == "int") {
                config.find("td").html("<input type='text' data-type='" + this.type + "' data-min='" + this.min + "' data-max='" + this.max + "' >");
            }
        }

        if (this.writeonly == false){
            if(this.readonly == true){
                config.find("td").html(this.value);
            } else if(this.type == "list") {
                config.find("td").find("select").val(this.value);
            } else if(this.type == "short" || this.type == "byte" || this.type == "int") {
                config.find("td").find("input").val(this.value);
            } else {
                config.find("td").html(this.value);
            }
        }

    })

}


function showDevice(){
    if (window.node_id != $(this).data('id')){
        window.node_id = $(this).data('id');
        $("#device").hide();
        $("#device .title").text("Device#" + window.node_id);
        $("#device .info .id td").html("Loading...");
        $("#device .info .lastseen td").html("Loading...");
        $("#device .info .neighbors td").html("Loading...");
        $("#device .config tbody").html("");
        $("#device .groups tbody").html("");
        $("#device").show();
    }
}


// ==============================================
// Actions
// ==============================================

function includenode(){
    if ($("#includenode").hasClass("btn-success") || $("#includenode").hasClass("btn-danger")){
        return true;
    }

    $.ajax({
        type: "POST",
        url: "IncludeNode",
        data: { instance_id: openzwavelist.instance_id[0]  }
    }).always( function (json_data, textStatus, errorThrown) {
        if (textStatus != "success" || json_data.result == undefined || json_data.result == false || json_data.error != undefined){
            $("#includenode").addClass("btn-danger");
        }else{
            $("#includenode").addClass("btn-success");
        }
        setTimeout("$('#includenode').removeClass('btn-success btn-danger');", 30000);

    })
}


function excludenode() {
    if ($("#excludenode").hasClass("btn-success") || $("#excludenode").hasClass("btn-danger")){
        return true;
    }

    $.ajax({
        type: "POST",
        url: "ExcludeNode",
        data: { instance_id: openzwavelist.instance_id[0]  }
    }).always( function (json_data, textStatus, errorThrown) {
        if (textStatus != "success" || json_data.result == undefined || json_data.result == false || json_data.error != undefined){
            $("#excludenode").addClass("btn-danger");
        }else{
            $("#excludenode").addClass("btn-success");
        }
        setTimeout("$('#excludenode').removeClass('btn-success btn-danger');", 30000);
    })
}

function cancelcommand() {
    if ($("#cancelcommand").hasClass("btn-success") || $("#cancelcommand").hasClass("btn-danger")){
        return true;
    }

    $.ajax({
        type: "POST",
        url: "CancelCommand",
        data: { instance_id: openzwavelist.instance_id[0] }
    }).always( function (json_data, textStatus, errorThrown) {
        if (textStatus != "success" || json_data.result == undefined || json_data.result == false || json_data.error != undefined){
            $("#cancelcommand").addClass("btn-danger");
        }else{
            $("#cancelcommand").addClass("btn-success");
            $('#includenode').removeClass('btn-success btn-danger');
            $('#excludenode').removeClass('btn-success btn-danger');
        }

        setTimeout("$('#cancelcommand').removeClass('btn-success btn-danger');", 5000);
      })
}

function healcommand() {
    $("#healcommand").removeClass("btn-success").removeClass("btn-danger");

    $.ajax({
        type: "POST",
        url: "Healnetwork",
        data: { instance_id: openzwavelist.instance_id[0]  }
    }).always( function (json_data, textStatus, errorThrown) {
        if (textStatus != "success" || json_data.result == undefined || json_data.result == false || json_data.error != undefined){
            $("#healcommand").addClass("btn-danger");
        }else{
            $("#healcommand").addClass("btn-success");
        }
    })
}


function updateDeviceConfigListSelect(){
    config_index = $(this).parent().parent().data("id");

    $.ajax({
        type: "POST",
        url: "SetConfig",
        data: { instance_id: openzwavelist.instance_id[0], node_id: window.node_id, index: config_index, type: 'list', value: this.value }
    })

}

function updateDeviceConfigListInput(){
    config_index = $(this).parent().parent().data("id");
    type = $(this).data("type");
    min = $(this).data("min");
    max = $(this).data("max");
    value = this.value;

    if (value > max || value < min){
        return true;
    }

    $.ajax({
        type: "POST",
        url: "SetConfig",
        data: { instance_id: openzwavelist.instance_id[0], node_id: window.node_id, index: config_index, type: type, value: this.value }
    })

}

function basicreportCommand(){

    $.ajax({
        type: "POST",
        url: "Basicreport",
        data: { instance_id: openzwavelist.instance_id[0], node_id: window.node_id }
    }).always( function (json_data, textStatus, errorThrown) {
        if (textStatus != "success" || json_data.result == undefined || json_data.result == false || json_data.error != undefined){
            $("#basicreport").addClass("btn-danger");
        }else{
            $("#basicreport").addClass("btn-success");
        }
    })

    setTimeout("$('#basicreport').removeClass('btn-success btn-danger');", 5000);

}

// ==============================================
// Helper functions
// ==============================================

function updateHeartbeat(){
    $("#heartbeat .badge").html(window.heartbeat = window.heartbeat + 1);
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
