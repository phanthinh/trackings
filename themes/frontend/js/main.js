;if(window.jQuery) (function($){
	window['main'] = {
		templateURL:null,
		redirect: function(strUrl) {
			window.location = strUrl;
		},
		History : {
			pushState : function(url) {

			}
		}
	};
})(jQuery);