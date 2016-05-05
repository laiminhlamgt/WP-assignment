<?php
  if($this->error != 404) {
    echo 'error: ' . $this->error_message;

  } else {
    echo '<div class="col-md-12 m-config-search-result"
            style="background-color:white; height:500px">
            <h2 style="color:#bd1000;text-align:center;">
              Không tìm thấy trang bạn yâu cầu
            </h2>
          </div>';
  }
?>
