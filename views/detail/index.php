<?php
if (isset($this->house)) {
  if ($this->house['type_of_house_id'] < 9) {
    $type = 'Cho thuê bất động sản';
  } else {
    $type = 'Mua bán bất động sản';
  }

  $title = $this->house['post_title'];
  $description = $this->house['post_description'];
  $address = $this->house['address'];

  $price = number_format($this->house['price']);
  $area = $this->house['area'];

  $numOfFloor = $this->house['number_of_floor'];
  $numOfRoom = $this->house['number_of_room'];
  $numOfRestroom = $this->house['number_of_restroom'];

  $contactName = $this->house['contact_name'];
  $mobile = $this->house['mobile_number'];
  $email = $this->house['email'];
  $picture1Id = $this->house['picture1_id'];
}
 ?>
<div class="col-md-9">
  <div class="row" style="margin-left:10px">
    <div class="pull-left">
      <h4>
        <?php echo (isset($type)) ? $type : ''; ?>
      </h4>
      <span style="font-size:25px;">
        <?php echo (isset($title)) ? $title : ''; ?>
      </span>
      <br>
      <span style="font-size:20px;">
        <?php echo (isset($address)) ? $address : ''; ?>
      </span>
    </div>
    <div class="pull-right">
      <span style="font-size:30px;">
        <?php echo (isset($price)) ? $price : ''; ?> VNĐ
      </span>
      <br>
      <span style="font-size:30px; float:right">
        <?php echo (isset($area)) ? $area : ''; ?> m2
      </span>
    </div>
  </div>
  <img class='d-image-img pending' image-id='<?php echo (isset($price)) ? $picture1Id : '' ;?>'
    img-max-width="800" img-max-height="500" style="margin:0 auto"/>


  <!-- <div class="row" style="margin-left:10px">
    <img class='d-image-img pending' image-id='<?php //echo $picture1Id ;?>'
      img-max-width="800" img-max-height="500" />
    <div id="imgslide" class="owl-carousel owl-theme">
      <div class="item"><img src="<?php //echo URL; ?>public/images/img1.jpg" alt="" /></div>
      <div class="item"><img src="<?php //echo URL; ?>public/images/img2.jpg" alt="" /></div>
      <div class="item"><img src="<?php //echo URL; ?>public/images/img3.jpg" alt="" /></div>
    </div>
  </div> -->

  <!-- Start of pdetail-->
  <br>
  <div class="row" style="margin-left:10px">
    <div id="m-pdetails">
      <h3 class="title-section">Mô Tả Chi Tiết</h3>
      <hr class="horizontal-line" />
      <p>
        <?php echo (isset($description)) ? $description : ''; ?>
      </p>

      <div class="row">
        <div class="col-md-6">
          <h3>Liên hệ</h3>
          <table>
            <tr>
              <td style="padding-right: 50px;padding-bottom: 10px"><strong>Tên liên lạc</strong></td>
              <td style="padding-bottom: 10px"><?php echo (isset($contactName)) ? $contactName : '';?></td>
            </tr>
            <tr>
              <td style="padding-right: 50px;padding-bottom: 10px"><strong>Mobile</strong></td>
              <td style="padding-bottom: 10px"><?php echo (isset($mobile)) ? $mobile : '';?></td>
            </tr>
            <tr>
              <td style="padding-right: 50px;padding-bottom: 10px"><strong>Email</strong></td>
              <td style="padding-bottom: 10px"><?php echo (isset($email)) ? $email : '';?></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <h3>Thông tin khác</h3>
          <table>
            <tr>
              <td style="padding-right: 50px;padding-bottom: 10px"><strong>Số tầng</strong></td>
              <td style="padding-bottom: 10px"><?php echo (isset($numOfFloor)) ? $numOfFloor : '';?></td>
            </tr>
            <tr>
              <td style="padding-right: 50px;padding-bottom: 10px"><strong>Số phòng</strong></td>
              <td style="padding-bottom: 10px"><?php echo (isset($numOfRoom)) ? $numOfRoom : '';?></td>
            </tr>
            <tr>
              <td style="padding-right: 50px;padding-bottom: 10px"><strong>Số toilet</strong></td>
              <td style="padding-bottom: 10px"><?php echo (isset($numOfRestroom)) ? $numOfRestroom : '';?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
