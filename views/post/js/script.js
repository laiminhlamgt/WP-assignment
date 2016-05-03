function moveTo(cssQueryToAnchor) {
  $('html, body').animate({
    'scrollTop': $(cssQueryToAnchor).offset().top
  }, 500);
}

function isMobileNumber(number) {
  var regex = /^(0|\+84)\d{9,10}$/;
  return number.match(regex);
}

function validateForm() {
  var location = '';
  var mobileNumber = $('input[name="mobile"]').val().trim();
  var name = $('input[name="name"]').val().trim();
  var description = $('textarea[name="description"]').val().trim();
  var title = $('input[name="title"]').val().trim();
  var typeOfHouse = $('select[name="type-of-house"]').val();

  // validate mobile number
  if (!mobileNumber) {
    $('#err-mobile').text('Bạn cần nhập số di động');
    location = '#err-mobile';

  } else if (!isMobileNumber(mobileNumber)) {
    $('#err-mobile').text('Số điện thoại không đúng định dạng. '
      + 'Mời bạn nhập lại!');
    location = '#err-mobile';

  } else {
    $('#err-mobile').text('');
  }

  // validate name
  if (!name) {
    $('#err-name').text('Bạn cần nhập họ tên');
    location = '#err-name';

  } else {
    $('#err-name').text('');
  }

  // validate description
  console.log(description);
  if (!description) {
    $('#err-description').text('Bạn cần nhập nội dung mô tả');
    location = '#err-description';

  } else if (description.length < 5) {
    $('#err-description').text('Nội dung mô tả phải có ít nhất 5 kí tự');
    location = '#err-description';

  } else {
    $('#err-description').text('');
  }

  // validate title
  if (!title) {
    $('#err-title').text('Bạn cần nhập tiêu đề');
    location = '#err-title';

  } else if (title.length < 5) {
    $('#err-title').text('Tiêu đề phải có ít nhất 5 kí tự');
    location = '#err-title';

  } else {
    $('#err-title').text('');
  }

  // validate type of house
  if (typeOfHouse < 1) {
    $('#err-type-of-house').text('Bạn cần chọn loại nhà đất');
    location = '#err-type-of-house';
  } else {
    $('#err-type-of-house').text('');
  }

  if (location) {
    moveTo(location);
    return false;

  } else {
    return true;
  }

}

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
