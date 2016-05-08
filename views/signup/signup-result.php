<div class="col-md-12 m-config-search-result"
  style="background-color:white; height:500px">
  <h2 style="color:#bd1000;text-align:center;">
  <?php echo $this->result; ?>
  </h2>

  <?php
  if (isset($this->isErr)) {
    if ($this->isErr) {
      echo "<p style='text-align:center;'>Quay lại trang <a href='".URL."signup'>Đăng kí</a></p>";
    } else {
      echo "<p style='text-align:center;'>Trở về <a href='".URL."'>Trang chủ</a></p>";
      echo "<p style='text-align:center;'>Hoặc <a href='".URL."login'>Đăng nhập</a></p>";
    }
  }
   ?>

</div>
