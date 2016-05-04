<!-- Start of search result + left detail -->
<div class="col-md-9 m-config-search-result">
  <h2 style="color:#bd1000;text-align:center;">Đăng tin bất động sản</h2>

  <form action="post/post" method="post" onsubmit="return validateForm()">
    <div class="l-info-box">
      <h3 class="l-title">Thông tin cơ bản</h3>
      <div class="l-info-item">
        <label>Loại nhà đất</label>
        <span class="l-required">(*)</span>
        <span class="l-required" id="err-type-of-house">
        <?php echo (isset($this->errTypeOfHouse)) ? $this->errTypeOfHouse : ''; ?>
        </span>
        <br>
        <select class="l-input l-input-select" name="type-of-house">
          <option value="-1">-- Chọn loại nhà đất --</option>
          <?php
          foreach ($this->lstTypeOfHouse as $key => $element) {
            $id = $element['id'];
            $name = $element['name'];
            echo "<option value='$id'>$name</option>";
          }
           ?>
        </select>
      </div>
      <div class="l-info-item">
        <label>Vị trí</label>
        <br>
        <select class="l-input l-input-select" name="district" id="district">
          <option value="-1">-- Chọn Quận/Huyện --</option>
          <?php
          foreach ($this->lstDistrict as $key => $element) {
            $id = $element['id'];
            $name = $element['name'];
            echo "<option value='$id'>$name</option>";
          }
           ?>
        </select>
        <select class="l-input l-input-select" name="ward" id="ward">
          <option value="-1">-- Chọn Phường/Xã --</option>
        </select>
        <select class="l-input l-input-select" name="street" id="street">
          <option value="-1">-- Chọn Đường/Phố --</option>
        </select>
        <select class="l-input l-input-select" name="type_of_project" id="project">
          <option value="-1">-- Chọn dự án --</option>
        </select>
      </div>
      <div class="l-info-item">
        <div class="l-info-item-col-3">
          <label>Giá</label>
          <input type="text" class="l-input" name="price" placeholder="VNĐ/tháng">
        </div>
        <div class="l-info-item-col-3">
          <label>Diện tích</label>
          <input type="text" class="l-input" name="area" placeholder="mét vuông">
        </div>
        <div class="l-clearer">
        </div>
      </div>
      <div class="l-info-item">
        <label>Địa chỉ</label>
        <input type="text" class="l-input l-input-long" name="address">
      </div>
    </div>
    <!-- Thong tin khac -->
    <div class="l-info-box">
      <h3 class="l-title">Thông tin khác</h3>
      <div class="l-info-item">
        <div class="l-info-item-col-3">
          <label>Số tầng</label>
          <input type="text" class="l-input" name="num_floor">
        </div>
        <div class="l-info-item-col-3">
          <label>Số phòng</label>
          <input type="text" class="l-input" name="num_room">
        </div>
        <div class="l-info-item-col-3">
          <label>Số toilet</label>
          <input type="text" class="l-input" name="num_toilet">
        </div>
        <div class="l-clearer">
        </div>
      </div>
    </div>
    <!-- Mo ta chi tiet -->
    <div class="l-info-box">
      <h3 class="l-title">Mô tả chi tiết</h3>
      <p class="l-input-required">
        (Vui lòng gõ tiếng Việt có dấu để tin đăng được kiểm duyệt nhanh hơn)
      </p>
      <div class="l-info-item">
        <label>Tiêu đề</label> <span class="l-required">(*)</span>
        <span class="l-required" id="err-title">
        <?php echo (isset($this->errTitle)) ? $this->errTitle : ''; ?>
        </span>
        <input type="text" class="l-input l-input-long" name="title">
      </div>
      <div class="l-info-item">
        <label>Nội dung mô tả</label> <span class="l-required">(*)</span>
        <span class="l-required" id="err-description">
        <?php echo (isset($this->errDescription)) ? $this->errDescription : ''; ?>
        </span>
        <textarea class="l-input l-input-long" rows="10" cols="30" name="description">
        </textarea>
      </div>
      <div class="l-info-item">
        <label>Cập nhật hình ảnh</label>
        <p class="l-input-required">
          (Bạn có thể nhập tối đa 1 ảnh và mỗi ảnh nặng không quá 4MB)
        </p>
        <div class='d-image-input-wrapper'>
          <input name='image' img-max-height="500" img-max-width="1200" class='d-image-input pending' type='text'/>
        </div>
      </div>
    </div>
    <!-- Thong tin lien he -->
    <div class="l-info-box">
      <h3 class="l-title">Thông tin liên hệ</h3>
      <div class="l-info-item">
        <label>Họ tên</label> <span class="l-required">(*)</span>
        <span class="l-required" id="err-name">
        <?php echo (isset($this->errName)) ? $this->errName : ''; ?>
        </span>
        <input type="text" name="name" class="l-input l-input-long"
          value="<?php
          echo (isset($this->fullname)) ? $this->fullname : '' ?>">
      </div>
      <div class="l-info-item">
        <label>Địa chỉ</label>
        <input type="text" name="addr" class="l-input l-input-long">
      </div>
      <div class="l-info-item">
        <label>Điện thoại</label>
        <input type="text" name="tel" class="l-input l-input-long"
          value="<?php echo (isset($this->tel)) ? $this->tel : '' ?>">
      </div>
      <div class="l-info-item">
        <label>Di động</label> <span class="l-required">(*)</span>
        <span class="l-required" id="err-mobile">
        <?php echo (isset($this->errMobile)) ? $this->errMobile : ''; ?>
        </span>
        <input type="text" name="mobile" class="l-input l-input-long"
          value="<?php echo (isset($this->mobile)) ? $this->mobile : '' ?>">
      </div>
      <div class="l-info-item">
        <label>Email</label>
        <input type="text" name="email" class="l-input l-input-long"
          value="<?php echo (isset($this->email)) ? $this->email : '' ?>">
      </div>
    </div>

    <div class="l-btnsubmit">
      <input type="submit" name="submit" value="Đăng tin" class="l-input l-btn-primary">
    </div>
  </form>

</div>
