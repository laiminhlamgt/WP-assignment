<?php

$numOfResult = count($this->lstHouse);

function render_thumnail($house, $isMyPage) {
  if ($isMyPage) {
    $link = '../post/edit?userId='.Session::get('userId').'&postId='.$house['id'];

  } else {
    $link = '../detail?postId='.$house['id'];
  }

  $thumbnail = '<div class="thumbnail" style="margin-top: 20px;">
                  <div class="image">
                    <img class="d-image-img pending" image-id="' .
                      $house['picture1_id'] .
                      '" img-max-width="225" img-max-height="176" />
                  </div>
                  <div class="caption">
                    <div class="info">
                      <p class="title">' . $house['post_title'] . '</p>
                      <table>
                        <tr>
                          <td class="tag"><b>Mức giá</b></td>
                          <td>: ' . $house['price'] . ' VNĐ</td>
                        </tr>
                        <tr>
                          <td class="tag"><b>Diện tích</b></td>
                          <td>: ' . $house['area'] . ' m2</td>
                        </tr>
                        <tr>
                          <td class="tag"><b>Khu vực</b></td>
                          <td>: ' . $house['address'] . '</td>
                        </tr>
                      </table>

                    </div>
                    <div class="info-bottom">
                      <span class="uploadOwner">' . $house['contact_name'] . '</span>
                    </div>
                    <span class="post-date">' . $house['updated'] . '</span>
                  </div>
                  <a href="' . $link . '" class="link"></a>

                  <div class="clearer">
                  </div>
                </div>';
  echo $thumbnail;
}

 ?>
 <!-- <a href="../detail/detail?postId=' . $house['id'] . '" class="link"></a> -->
 <!-- <div class="delete">
   <a href="../detail/de" class="delete"> </a>
   <img src="'.URL.'public/images/delete.png" alt="del" height="20" width="20" class="delete">
 </div> -->
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
      render_thumnail($house, $this->isMyPage);
    }

  } else {
    echo "<h4>Không tìm thấy kết quả tìm kiếm</h4>";
  }

   ?>

</div>
