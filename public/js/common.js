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

function addSTypes(lstTypes) {
  var typeSelect = $('select[name="stype-of-house"]');
  typeSelect.children().remove();
  typeSelect.append('<option value="-1">-- Loại nhà đất --</option>');

  lstTypes.forEach(function(element) {
    typeSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

function addSDistricts(lstDistricts) {
  var districtSelect = $('select[name="sdistrict"]');
  districtSelect.children().remove();
  districtSelect.append('<option value="-1">-- Quận/Huyện --</option>');

  lstDistricts.forEach(function(element) {
    districtSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

var reqTypeOfHouses = $.ajax({
  url: Define_URL + 'post/getLstTypeOfHouses',
  method: "GET",
  dataType: "json"
});

reqTypeOfHouses.done(function(lstTypes) {
  addSTypes(lstTypes);
});

reqTypeOfHouses.fail(function( jqXHR, textStatus ) {
  console.log(jqXHR.responseText);
  // alert( "Request failed: " + textStatus );
});

var reqDistricts = $.ajax({
  url: Define_URL + 'post/getLstDistricts',
  method: "GET",
  dataType: "json"
});

reqDistricts.done(function(lstDistricts) {
  addSDistricts(lstDistricts);
});
//
reqDistricts.fail(function( jqXHR, textStatus ) {
  console.log(jqXHR.responseText);
  // alert( "Request failed: " + textStatus );
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

function addSWards(lstWards) {
  var wardSelect = $('#sward');
  wardSelect.children().remove();
  wardSelect.append('<option value="-1">-- Phường/Xã --</option>');

  lstWards.forEach(function(element) {
    wardSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

function addSStreets(lstStreets) {
  var streetSelect = $('#sstreet');
  streetSelect.children().remove();
  streetSelect.append('<option value="-1">-- Đường/Phố --</option>');

  lstStreets.forEach(function(element) {
    streetSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

function addSProjects(lstProjects) {
  var projectSelect = $('#sproject');
  projectSelect.children().remove();
  projectSelect.append('<option value="-1">-- Dự án --</option>');

  lstProjects.forEach(function(element) {
    projectSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

$(function () {

  $('select[name="sdistrict"]').change( function () {
    var optionSelected = $(this).find('option:selected');
    var valueSelected  = optionSelected.val();

    var requestWards = $.ajax({
      url: Define_URL + 'post/getLstWards',
      method: "GET",
      data: { 'district_id' : valueSelected },
      dataType: "json"
    });

    requestWards.done(function(lstWards) {
      addSWards(lstWards);
    });
    //
    requestWards.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      // alert( "Request failed: " + textStatus );
    });

    var requestStreets = $.ajax({
      url: Define_URL + 'post/getLstStreets',
      method: "GET",
      data: { 'district_id' : valueSelected },
      dataType: "json"
    });

    requestStreets.done(function(lstStreets) {
      addSStreets(lstStreets);
    });

    requestStreets.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      // alert( "Request failed: " + textStatus );
    });

    var requestProjects = $.ajax({
      url: Define_URL + 'post/getLstProjects',
      method: "GET",
      data: { 'district_id' : valueSelected },
      dataType: "json"
    });

    requestProjects.done(function(lstProjects) {
      addSProjects(lstProjects);
    });

    requestProjects.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      // alert( "Request projects failed: " + textStatus );
    });

  });

});
