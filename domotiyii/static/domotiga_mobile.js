function set_device(id,value) {
    $.ajax({
        type: "POST",        
        url: "setdevice",
        data: {Device: { id: id, value: value}  },
        success: function () {
           
        }
      })
}
