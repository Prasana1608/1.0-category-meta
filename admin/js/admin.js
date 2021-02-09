

jQuery(function($){

	$( document ).ready(function() {
		var preview = $('.image-preview').attr('src');
		var length = preview.length
		var button = $(".category-image-upload");
		var remove = $(".category-image-remove");
		var input = $('.test-input');
		var input_color = $('.input-color');
		var input_color_div = $(".color-row td").append(`<p class="input_color_hex">${$(input_color).val()}</p>`);
		
 
		if (length>0){
			button.text("Change Image");
		}
		if( $(input).val().length === 0 ) {
			$(remove).css("visibility", "hidden");
	  }


	  $(document).on("change" , ".input-color" , function(){
		$('.input_color_hex').html($(this).val());
	  });
	  




	});
	
 
	// on upload button click
	$('body').on( 'click', '.category-image-upload', function(e){
 
		e.preventDefault();
 
		var button = $(this),
		custom_uploader = wp.media({
			title: 'Insert image',
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
				type : 'image'
			},
			button: {
				text: 'Use this image' // button label text
			},
			multiple: false
		}).on('select', function() { // it also has "open" and "close" events
			var attachment = custom_uploader.state().get('selection').first().toJSON();
            button.html('<img src="' + attachment.url + '"><input type="text" name="Cat_meta[img]" id="Cat_meta[img]" size="3" style="width:60%; display: none !important; focus:none;"  value="' + attachment.url + '"></input>').next().val(attachment.id).next().show();
            var preview = $('.image-preview')
			preview.css("display", "none");
			var remove = $('.category-image-remove');
			remove.css("visibility", "visible");
            // $("#Cat_meta[img]").val(url);
            // console.log(url);
		}).open();
 
	});
 
	// on remove button click
	$('body').on('click', '.category-image-remove', function(e){
 
		e.preventDefault();
		console.log('clicked');
		var button = $(this);
		var button2 = $('.category-image-remove');
		var preview = $('.image-preview');
		
		button.next().val(''); // emptying the hidden field
		button.hide().prev().html('Upload image');
		button2.text("");
		preview.css("display", "none");

	});
	var button2 = $('.category-image-remove');
	var input = $('.test-input');
	$(button2).on('click', function () {
        input.val('');
    });

 
});