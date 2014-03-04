;(function($) {

        $.fn.yiiLiveGridView = function(options) {
                return $.fn.yiiGridView(options);
        };

        $.fn.yiiLiveGridView.update = function(id, options) {

                var settings = $.fn.yiiGridView.settings[id];
                
                // $('#'+id).addClass(settings.loadingClass);
                
                options = $.extend({
                        type: 'GET',
                        url: $.fn.yiiGridView.getUrl(id),
                        success: function(data,status) {
                                $.each(settings.ajaxUpdate, function(i,v) {
                                        var id='#'+v,
                                                $d=$(data),
                                                $filtered=$d.filter(id);
                                        $(id).replaceWith( $filtered.size() ? $filtered : $d.find(id));
                                       
                                });
                                if(settings.afterAjaxUpdate != undefined)
                                        settings.afterAjaxUpdate(id, data);
                                        
                                // $('#'+id).removeClass(settings.loadingClass);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                // $('#'+id).removeClass(settings.loadingClass);
                                // console.log(XMLHttpRequest.responseText);
                        }
                }, options || {});
                if(options.data!=undefined && options.type=='GET') {
                        options.url = $.param.querystring(options.url, options.data);
                        options.data = {};
                }

                if(settings.ajaxUpdate!==false) {
                        options.url = $.param.querystring(options.url, settings.ajaxVar+'='+id);
                        if(settings.beforeAjaxUpdate != undefined)
                                settings.beforeAjaxUpdate(id, options);
                        $.ajax(options);
				}
		};
})(jQuery);
