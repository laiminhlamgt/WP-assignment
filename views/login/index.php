<div class="d-login-wrapper">
  <div class="d-container">
    <form class="d-login-form" method="post" action="<?php echo URL; ?>login/login" onsubmit="return validateForm()">
      <div class="d-login-title">
        Đăng Nhập
      </div>
      <div class="d-login-inputs">
        <input placeholder="Địa chỉ email" type="text" name="email">
        <input placeholder="Mật khẩu" type="password" name="password">
        <span class="l-required" id="error">
        <?php echo (isset($this->err)) ? $this->err : ''; ?>
        </span>

        <div class="d-login-forgotpassword-wrapper">
          <a class="d-login-forgotpassword">
            Quên mật khẩu?
          </a>
        </div>
        <input class="d-login-submitbtn" type="submit" name="login" value="Đăng nhập">
        <!-- <button class="d-login-submitbtn" type="submit" name="login">Đăng nhập</button> -->
      </div>
      <div class="d-login-signup">
        Chưa có mật khẩu? <a href="<?php echo URL; ?>signup">Đăng ký</a>
      </div>
    </form>
  </div>
</div>
