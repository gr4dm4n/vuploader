(function($){
	$.fn.extend({
		vuploader: function(options){
			var defaults = {
				url: 'upload.php'
			}

			//merge between defaults and options
			var options = $.extend(defaults, options);
			return this.each(function(){
				$.ajax({
					  	type: "POST",
					  	url: options.url
					  	data: $(this).serialize()
					  }).done(function( msg ) {
					  	alert( "Data Saved: " + msg );
					  });
			});
				
		}
	});
})(jQuery);