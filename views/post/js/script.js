
function addWards(lstWards) {
  var wardSelect = $('#ward');
  wardSelect.children().remove();
  wardSelect.append('<option value="-1">-- Chọn Phường/Xã --</option>');

  lstWards.forEach(function(element) {
    wardSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

function addStreets(lstStreets) {
  var streetSelect = $('#street');
  streetSelect.children().remove();
  streetSelect.append('<option value="-1">-- Chọn Đường/Phố --</option>');

  lstStreets.forEach(function(element) {
    streetSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

function addProjects(lstProjects) {
  var projectSelect = $('#project');
  projectSelect.children().remove();
  projectSelect.append('<option value="-1">-- Chọn dự án --</option>');

  lstProjects.forEach(function(element) {
    projectSelect.append('<option value="' + element.id
      + '">' + element.name + '</option>');
  });
}

$(function () {

  $('#district').change( function () {
    var optionSelected = $(this).find('option:selected');
    var valueSelected  = optionSelected.val();

    var requestWards = $.ajax({
      url: 'post/getLstWards',
      method: "GET",
      data: { 'district_id' : valueSelected },
      dataType: "json"
    });

    requestWards.done(function(lstWards) {
      addWards(lstWards);
    });
    //
    requestWards.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      // alert( "Request failed: " + textStatus );
    });

    var requestStreets = $.ajax({
      url: 'post/getLstStreets',
      method: "GET",
      data: { 'district_id' : valueSelected },
      dataType: "json"
    });

    requestStreets.done(function(lstStreets) {
      addStreets(lstStreets);
    });

    requestStreets.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      // alert( "Request failed: " + textStatus );
    });

    var requestProjects = $.ajax({
      url: 'post/getLstProjects',
      method: "GET",
      data: { 'district_id' : valueSelected },
      dataType: "json"
    });

    requestProjects.done(function(lstProjects) {
      addProjects(lstProjects);
    });

    requestProjects.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      // alert( "Request projects failed: " + textStatus );
    });

  });

});
