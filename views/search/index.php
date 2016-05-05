<?php

$numOfResult = count($this->lstHouse);

function render_thumnail($house) {
  $thumbnail = '<div class="thumbnail" style="margin-top: 20px;">
                  <div class="image">
                    <img class="d-image-img pending image" image-id="' .
                      $house['picture1_id'] .
                      '" img-max-width="1200" img-max-height="500" />
                  </div>
                  <div class="caption">
                    <div class="info">
                      <p class="address">' . $house['address'] . '</p>
                      <p class="cost">' . $house['price'] . '</p>
                      <p class="other">2 phòng ngủ</p>
                    </div>
                    <div class="info-bottom">
                      <span class="uploadOwner">' . $house['contact_name'] . '</span>
                    </div>
                  </div>
                  <a href="detail.html" class="link"></a>
                  <div class="clearer">
                  </div>
                </div>';
  echo $thumbnail;
}

 ?>

<!-- Start of search result + left detail -->
<div class="col-md-9 m-config-search-result">

  <?php if ($numOfResult > 0) { ?>
    <h4>Tp HCM, Quận 10</h4>
    <a href="#">Quận 10</a> <span class="glyphicon glyphicon-menu-right"></span> <a href="#">Phường 14</a>
    <br>
    <br>
    <ul>
      <li><?php echo $numOfResult; ?> Kết Qủa Sắp Xếp Theo</li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:orange">
          <span data-role="facet-label" style="color:#FF9009">Mới Cập Nhật</span><i class="caret" style="color:#FF9009"></i>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#" style="color:#FF9009">Giá Thấp Nhất</a></li>
          <li><a href="#" style="color:#FF9009">Giá Cao Nhất</a></li>
          <li><a href="#" style="color:#FF9009">Nhà Mở</a></li>
          <li><a href="#" style="color:#FF9009">Giá Ưu Đãi</a></li>
        </ul>
      </li>
      <li class="dropdown pull-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:orange">
          <span data-role="facet-label" style="color:#FF9009">Liệt Kê</span><i class="caret" style="color:#FF9009"></i>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#" style="color:#FF9009">Bản Đồ</a></li>
        </ul>
      </li>
    </ul>

  <?php

    foreach ($this->lstHouse as $key => $house) {
      render_thumnail($house);
    }

  } else {
    echo "<h4>Không tìm thấy kết quả tìm kiếm</h4>";
  }

   ?>

</div>
