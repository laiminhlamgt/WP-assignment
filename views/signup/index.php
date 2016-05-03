<div class="d-login-wrapper">
  <div class="d-container">
    <form class="d-login-form" method="post" action="signup/signup" onsubmit="return validateForm()">
      <div class="d-login-title">
        Đăng Kí
      </div>
      <div class="d-login-inputs">
        <input placeholder="Họ" type="text" name="lastname">
        <input placeholder="Tên" type="text" name="firstname">
        <input placeholder="Địa chỉ email" type="text" name="email">
        <input placeholder="Mật khẩu" type="password" name="password">
        <input placeholder="Nhập lại mật khẩu" type="password" name="repassword">
        <input placeholder="Di động" type="text" name="mobile">
        <input placeholder="Điện thoại" type="text" name="tel">
        <span class="l-required" id="error">
        <?php echo (isset($this->err)) ? $this->err : ''; ?>
        </span>

        <div class="d-login-forgotpassword-wrapper">
          <a class="d-login-forgotpassword">
            Quên mật khẩu?
          </a>
        </div>
        <input class="d-login-submitbtn" type="submit" name="submit" value="Đăng kí">
        <!-- <button class="d-login-submitbtn" type="submit" name="signup">Đăng kí</button> -->
      </div>
      <div class="d-login-signup">
        Đã có tài khoản? <a href="login">Đăng nhập</a>
      </div>
    </form>
  </div>
</div>
