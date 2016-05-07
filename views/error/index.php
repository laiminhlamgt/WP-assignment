<?php
  if($this->error != 404) {
    echo 'error: ' . $this->error_message;

  } else {
    echo '<div class="col-md-12 m-config-search-result"
            style="background-color:white; height:480px">
            <br><br>
            <h2 style="color:#bd1000;text-align:center;">
              Không tìm thấy trang bạn yêu cầu
            </h2>
            <p style="text-align:center;">
              Quay về trang chủ tại <a href="'.URL.'index">đây</a>
            </p>
          </div>';
  }
?>
