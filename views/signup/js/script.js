function isEmail(email) {
  var regex = /\S+@\S+\.\S+/;
  return email.match(regex);
}

function isMobileNumber(number) {
  var regex = /^(0|\+84)\d{9,10}$/;
  return number.match(regex);
}

function validateForm() {
  var error = $('#error');
  // validate last name
  var lname = $('input[name="lastname"]');
  if (!lname.val().trim()) {
    lname.focus();

    error.text('Bạn cần nhập Họ');
    return false;

  } else {
    error.text('');
  }

  // validate first name
  var fname = $('input[name="firstname"]');
  if (!fname.val().trim()) {
    fname.focus();

    error.text('Bạn cần nhập Tên');
    return false;

  } else {
    error.text('');
  }

  // validate email
  var email = $('input[name="email"]');
  var strEmail = email.val().trim();
  if (!strEmail) {
    email.focus();

    error.text('Bạn cần nhập địa chỉ email');
    return false;

  } else if (!isEmail(strEmail)) {
    email.focus();

    error.text('Địa chỉ email không hợp lệ');
    return false;

  } else {
    error.text('');
  }

  // validate password
  var password = $('input[name="password"]');
  var repassword = $('input[name="repassword"]');

  var strPassword = password.val().trim();
  var strRepassword = repassword.val().trim();
  if (!strPassword) {
    password.focus();

    error.text('Bạn cần nhập password');
    return false;

  } else if (!strRepassword) {
    repassword.focus();

    error.text('Bạn cần xác nhận password');
    return false;

  } else if (strPassword != strRepassword) {
    password.val('');
    repassword.val('');
    password.focus();

    error.text('Hãy chắc chắn bạn nhập đúng password');
    return false;
  }

  // validate mobile number
  var mobile = $('input[name="mobile"]');
  var mobileNumber = mobile.val().trim();
  if (mobileNumber && !isMobileNumber(mobileNumber)) {
    mobile.focus();

    error.text('Số điện thoại không đúng định dạng');
    return false;

  } else {
    error.text('');
  }

  return true;
}
