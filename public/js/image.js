/// Duong Tran 2016 0502 
/// custom input for image

function createGuid()
{
	return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
		var r = Math.random()*16|0, v = c === 'x' ? r : (r&0x3|0x8);
		return v.toString(16);
	});
}

function processImageInput(control)
{
	
	var customId = $(control).attr('customid');
	var imgValue = $(control).val();
	 //create relate element
	 if (typeof customId === typeof undefined || customId === false) {
	 	var guidId = createGuid();
	 	$(control).attr('customid', guidId);

	 	
	 	var imgTag = document.createElement('img');
	 	$(imgTag).attr('id','img_' + guidId);
	 	$(imgTag).hide();
	 	$(control).after(imgTag);

	 	var inputImgFile = document.createElement('input');
	 	$(inputImgFile).attr('id','input_' + guidId);
	 	$(inputImgFile).attr('type','file');
	 	$(inputImgFile).attr('onchange', 'uploadImage("' + guidId + '")');
	 	$(imgTag).after(inputImgFile);

	 	var deleteTag = document.createElement('div');
	 	$(deleteTag).attr('id','div_' + guidId);
	 	$(deleteTag).html('delete');
	 	$(deleteTag).attr('onclick','removeImage("' + guidId + '")');
	 	$(deleteTag).addClass('d-image-delete-tag');
	 	$(deleteTag).hide();
	 	$(inputImgFile).after(deleteTag);

	 }
	 if(imgValue != '')
	 {
	 	$.ajax(
	 	{
	 		url: Define_URL + 'gallery/generate_image_content_ajax',
	 		type: "GET",
	 		data: {imgId:imgValue},
	 		dataType : "json",
	 		success:function(response) 
	 		{
	 			if(response.status == true)
	 			{			
	 				$('#img_' + guidId).attr('src',response.data.src);

	 				var img_max_height = $(control).attr('img-max-height');
	 				var img_max_width = $(control).attr('img-max-width');
	 				var height = response.data.height;
	 				var width = response.data.width;

	 				if(parseInt(img_max_width,10) > 0 && parseInt(img_max_height,10) > 0)
	 				{
	 					if(parseInt(height,10) > parseInt(img_max_height,10))
	 					{
	 						width = img_max_height * width / height; 
	 						height = img_max_height;
	 					}
	 					//console.log("2 : " + img_max_height + " " + img_max_width + " " + height + " " + width);

	 					if(parseInt(width,10) > parseInt(img_max_width,10))
	 					{
	 						height = img_max_width * height / width; 
	 						width = img_max_width;	
	 					}
	 					// console.log("3 : " + img_max_height + " " + img_max_width + " " + height + " " + width);
	 				}else if(parseInt(img_max_height,10) > 0 && parseInt(height,10) > parseInt(img_max_height,10))
	 				{
	 					width = img_max_height * width / height; 
	 					height = img_max_height;
	 				}else if(parseInt(img_max_width,10) > 0 && width > parseInt(img_max_width,10))
	 				{
	 					height = img_max_width * height / width; 
	 					width = img_max_width;
	 				}

	 				$('#img_' + guidId).attr('height',height);
	 				$('#img_' + guidId).attr('width',width);
	 				$('#img_' + guidId).show();
	 				$('#div_' + guidId).show();
	 				$('#input_' + guidId).hide();
	 			}
	 			else
	 			{
	 				console.log(response.message);	
	 			}
	 		},
	 		error: function(jqXHR, textStatus, errorThrown) 
	 		{  
	 			alert('error :' + jqXHR.responseText);   
	 		}
	 	});
	 }




	 $(control).removeClass('pending');
	 $(control).addClass('processed');
	}

	function uploadImage(guidId)
	{
		var inputImg = $('#input_' + guidId);
		if(inputImg.val() == '')
			return;
		
		//Begin upload
		var files = new FormData();
		files.append('image',inputImg[0].files[0]);

		$.ajax({
			url: Define_URL + 'gallery/upload',
			// The type of request.
			type: "post",
			// The type of data that is getting returned.
			data: files,
			mimeType: "multipart/form-data",
			dataType : "json",
			contentType: false,
			processData: false,
			success: function( response ){
				console.log(response);
				if(response.status == true)
				{
					$('#img_' + guidId).attr('src',response.data.src);

	 				var img_max_height = $($('input[customid=' + guidId +']')[0]).attr('img-max-height');
	 				var img_max_width = $($('input[customid=' + guidId +']')[0]).attr('img-max-width');
	 				var height = response.data.height;
	 				var width = response.data.width;
	 				//console.log("1 : " + img_max_height + " " + img_max_width + " " + height + " " + width);
	 				if(parseInt(img_max_width,10) > 0 && parseInt(img_max_height,10) > 0)
	 				{
	 					if(parseInt(height,10) > parseInt(img_max_height,10))
	 					{
	 						width = img_max_height * width / height; 
	 						height = img_max_height;
	 					}
	 					//console.log("2 : " + img_max_height + " " + img_max_width + " " + height + " " + width);

	 					if(parseInt(width,10) > parseInt(img_max_width,10))
	 					{
	 						height = img_max_width * height / width; 
	 						width = img_max_width;	
	 					}
	 					// console.log("3 : " + img_max_height + " " + img_max_width + " " + height + " " + width);
	 				}else if(parseInt(img_max_height,10) > 0 && parseInt(height,10) > parseInt(img_max_height,10))
	 				{
	 					width = img_max_height * width / height; 
	 					height = img_max_height;
	 				}else if(parseInt(img_max_width,10) > 0 && width > parseInt(img_max_width,10))
	 				{
	 					height = img_max_width * height / width; 
	 					width = img_max_width;
	 				}

	 				$('#img_' + guidId).attr('height',height);
	 				$('#img_' + guidId).attr('width',width);
	 				$('#img_' + guidId).show();
	 				$('#div_' + guidId).show();
	 				inputImg.hide();
	 				$($('input[customid=' + guidId +']')[0]).val(response.data.id);
					//$('#div_' + guidId).html('<img height="' + response.data.height + '" width = "' + response.data.width + '" src="' + response.data.src + '" />')
				}
				else
				{
					alert(response.message);
				}
			}
		});

		//End upload
	}

	function removeImage(guidId)
	{
		$('#input_' + guidId).val('');
		$('#input_' + guidId).show();

		$($('input[customid=' + guidId +']')[0]).val('');

		$('#img_' + guidId).hide();
		$('#div_' + guidId).hide();



	};

	function processImageImg(control)
	{
		var imgValue = $(control).attr('image-id');
		if(imgValue > 0)
		{
			$.ajax(
		 	{
		 		url: Define_URL + 'gallery/generate_image_content_ajax',
		 		type: "GET",
		 		data: {imgId:imgValue},
		 		dataType : "json",
		 		success:function(response) 
		 		{
		 			console.log(response);
		 			if(response.status == true)
		 			{			
		 				$(control).attr('src',response.data.src);

		 				var img_max_height = $(control).attr('img-max-height');
		 				var img_max_width = $(control).attr('img-max-width');
		 				var height = response.data.height;
		 				var width = response.data.width;

		 				if(parseInt(img_max_width,10) > 0 && parseInt(img_max_height,10) > 0)
		 				{
		 					if(parseInt(height,10) > parseInt(img_max_height,10))
		 					{
		 						width = img_max_height * width / height; 
		 						height = img_max_height;
		 					}
		 					//console.log("2 : " + img_max_height + " " + img_max_width + " " + height + " " + width);

		 					if(parseInt(width,10) > parseInt(img_max_width,10))
		 					{
		 						height = img_max_width * height / width; 
		 						width = img_max_width;	
		 					}
		 					// console.log("3 : " + img_max_height + " " + img_max_width + " " + height + " " + width);
		 				}else if(parseInt(img_max_height,10) > 0 && parseInt(height,10) > parseInt(img_max_height,10))
		 				{
		 					width = img_max_height * width / height; 
		 					height = img_max_height;
		 				}else if(parseInt(img_max_width,10) > 0 && width > parseInt(img_max_width,10))
		 				{
		 					height = img_max_width * height / width; 
		 					width = img_max_width;
		 				}

		 				$(control).attr('height',height);
		 				$(control).attr('width',width);
		 			}
		 			else
		 			{
		 				console.log(response.message);	
		 			}
		 		},
		 		error: function(jqXHR, textStatus, errorThrown) 
		 		{  
		 			alert('error :' + jqXHR.responseText);   
		 		}
		 	});
		}
	 	$(control).removeClass('pending');
	 	$(control).addClass('processed');
	};

	setInterval(function(){
		$('.d-image-input.pending').each(function(){
			processImageInput(this);
		});
		$('.d-image-img.pending').each(function(){
			processImageImg(this);
		});
	}, 500);
