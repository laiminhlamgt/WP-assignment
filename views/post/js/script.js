
function addWard(lstWard) {
  var wardSelect = $('#ward');
  wardSelect.children().remove();
  wardSelect.append('<option value="-1">-- Chọn Phường/Xã --</option>');

  lstWard.forEach(function(element) {
    wardSelect.append('<option value="' + element.id
      + '">-- ' + element.name + ' --</option>');
  });
}

function addStreet(lstStreet) {
  var streetSelect = $('#street');
  streetSelect.children().remove();
  streetSelect.append('<option value="-1">-- Chọn Đường/Phố --</option>');

  lstStreet.forEach(function(element) {
    streetSelect.append('<option value="' + element.id
      + '">-- ' + element.name + ' --</option>');
  });
}

$(function () {

  $('#district').change( function () {
    var optionSelected = $(this).find('option:selected');
    var valueSelected  = optionSelected.val();

    var requestWard = $.ajax({
      url: 'post/getLstWard',
      method: "GET",
      data: { 'district' : valueSelected },
      dataType: "json"
    });

    requestWard.done(function(lstWard) {
      addWard(lstWard);
    });
    //
    requestWard.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      alert( "Request failed: " + textStatus );
    });

    var requestStreet = $.ajax({
      url: 'post/getLstStreet',
      method: "GET",
      data: { 'district' : valueSelected },
      dataType: "json"
    });

    requestStreet.done(function(lstStreet) {
      addStreet(lstStreet);
    });
    //
    requestStreet.fail(function( jqXHR, textStatus ) {
      console.log(jqXHR.responseText);
      alert( "Request failed: " + textStatus );
    });

  });

});
