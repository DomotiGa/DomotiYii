function switchType(element){
    var sel = $(element).val();
    if (sel == 'serial') {
        $('#tcphost').attr('readonly','readonly');
        $('#tcpport').attr('readonly','readonly');
        $('#serialport').removeAttr('readonly');
        $('#baudrate').removeAttr('readonly');
    } else {
        $('#tcphost').removeAttr('readonly');
        $('#tcpport').removeAttr('readonly');
        $('#serialport').attr('readonly','readonly');
        $('#baudrate').attr('readonly','readonly');
    }
}

function switchTypeExtra(element){
    var sel = $(element).val();
    if (sel == 'serial') {
        $('#tcphost').attr('readonly','readonly');
        $('#tcpport').attr('readonly','readonly');
        $('#serialport').removeAttr('readonly');
        $('#baudrate').removeAttr('readonly');
        $('#databits').removeAttr('readonly');
        $('#stopbits').removeAttr('readonly');
        $('#parity').removeAttr('readonly');
    } else {
        $('#tcphost').removeAttr('readonly');
        $('#tcpport').removeAttr('readonly');
        $('#serialport').attr('readonly','readonly');
        $('#baudrate').attr('readonly','readonly');
        $('#databits').attr('readonly','readonly');
        $('#stopbits').attr('readonly','readonly');
        $('#parity').attr('readonly','readonly');
    }
}

function switchRelay(element){
    if (element.checked) {
        $('#relayport').removeAttr('readonly');
    } else {
        $('#relayport').attr('readonly','readonly');
    }
}

function set_device(id,value) {
    $.ajax({
        type: "POST",        
        url: "setdevice",
        data: {Device: { id: id, value: value}  },
        success: function () {
           console.log('done');
        }
      })
}
