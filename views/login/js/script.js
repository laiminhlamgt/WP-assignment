function isEmail(email) {
  var regex = /\S+@\S+\.\S+/;
  return email.match(regex);
}

function validateForm() {
  var error = $('#error');

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

  return true;
}
