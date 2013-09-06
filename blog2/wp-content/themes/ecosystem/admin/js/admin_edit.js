jQuery(document).ready( function () { 
	
	var class_video = jQuery('.video_type').val()
	jQuery('#custom-metabox_video').addClass(class_video);
	
    jQuery('.video_type').change(function() {
		class_video = jQuery(this).val()
		jQuery('#custom-metabox_video').removeClass('youtube vimeo')
		jQuery('#custom-metabox_video').addClass(class_video);
		if(class_video=="vimeo"){
			jQuery('.videourl_wrap label').html("http://vimeo.com/")
		}
		if(class_video=="youtube"){
			jQuery('.videourl_wrap label').html("http://youtube.com/watch?v=")
		}
	});
});