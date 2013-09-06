jQuery(document).ready( function ($) { 
	
	$(".video-list li").click(function() {
		
		activeli = $(this);
		
		if(!activeli.hasClass('active')){
			
			data_id = activeli.attr("data-id");
			
			$('.video-wrap').find(".active").fadeOut('fast', 'linear', function() {
				
				$(".video-list").find(".active").removeClass('active');
				$(".video-wrap").find(".active").removeClass('active');
				
				activeli.addClass('active');	
				
				$("#vid-"+data_id).fadeIn(1600, "linear", function() {
					$("#vid-"+data_id).addClass('active');
				});		
				
			});
			
		}
	});
	
});