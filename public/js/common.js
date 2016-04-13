$(window).resize(function () {
    if ($(window).width() > 996) {
        $('#navbarMenuDiv').addClass('d-navbar-menu-collapse');
        $('.d-bgcover').hide();
    }
});

$(document).ready(function() {
  $('.d-bgcover').on("click",function(){
    ToggleMenu();
  });
});



function ToggleMenu(){
    $('#navbarMenuDiv').toggleClass('d-navbar-menu-collapse');
    if(!$('.d-bgcover').is(":visible")){
      $('body').css('overflow','hidden');
    }
    else{
      $('body').css('overflow','auto');
    }
    $('.d-bgcover').toggle();
};

function collapseContent(id,control)
{
	$('.d-menu-content'	).each(function(){
		if($(this).attr('id') != id)
		{
			$(this).removeClass('open');
		}
	});
	$('.fa-minus-circle').each(function(){
		if(!$(this).is($(control)))
		{
			$(this).removeClass('fa-minus-circle');
			$(this).addClass('fa-plus-circle');
		}
	});
	$('#'+id).toggleClass('open');
	$(control).toggleClass('fa-plus-circle');
	$(control).toggleClass('fa-minus-circle');
	
	
	
}