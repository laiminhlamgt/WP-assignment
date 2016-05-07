<!-- Start of search result + left detail -->
<div class="col-md-9 m-config-search-result">
  <h2 style="color:#bd1000;text-align:center;">Đăng tin bất động sản</h2>
  <?php $action = (isset($this->isEditMode) && $this->isEditMode == true)
          ? 'post'
          : 'post/post' ?>
  <form action="<?php echo $action ?>" method="post" onsubmit="return validateForm()">
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

            if (isset($this->typeOfHouseId) && $this->typeOfHouseId == $id) {
              echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';
            } else {
              echo "<option value='$id'>$name</option>";
            }
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

            if (isset($this->districtId) && $this->districtId == $id) {
              echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';
            } else {
              echo "<option value='$id'>$name</option>";
            }
          }
           ?>
        </select>
        <select class="l-input l-input-select" name="ward" id="ward">
          <option value="-1">-- Chọn Phường/Xã --</option>
          <?php
          if (isset($this->lstWards)) {
            foreach ($this->lstWards as $key => $element) {
              $id = $element['id'];
              $name = $element['name'];

              if (isset($this->wardId) && $this->wardId == $id) {
                echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';
              } else {
                echo "<option value='$id'>$name</option>";
              }
            }
          }
           ?>
        </select>
        <select class="l-input l-input-select" name="street" id="street">
          <option value="-1">-- Chọn Đường/Phố --</option>
          <?php
          if (isset($this->lstStreets)) {
            foreach ($this->lstStreets as $key => $element) {
              $id = $element['id'];
              $name = $element['name'];

              if (isset($this->streetId) && $this->streetId == $id) {
                echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';
              } else {
                echo "<option value='$id'>$name</option>";
              }
            }
          }
           ?>
        </select>
        <select class="l-input l-input-select" name="type_of_project" id="project">
          <option value="-1">-- Chọn dự án --</option>
          <?php
          if (isset($this->lstProjects)) {
            foreach ($this->lstProjects as $key => $element) {
              $id = $element['id'];
              $name = $element['name'];

              if (isset($this->projectId) && $this->projectId == $id) {
                echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';
              } else {
                echo "<option value='$id'>$name</option>";
              }
            }
          }
           ?>
        </select>
      </div>
      <div class="l-info-item">
        <div class="l-info-item-col-3">
          <label>Giá</label>
          <input type="text" class="l-input" name="price" placeholder="VNĐ/tháng"
          <?php
          if (isset($this->price)) {
            echo 'value="'. $this->price .'"';
          }
           ?>>
        </div>
        <div class="l-info-item-col-3">
          <label>Diện tích</label>
          <input type="text" class="l-input" name="area" placeholder="mét vuông"
          <?php
          if (isset($this->area)) {
            echo 'value="'. $this->area .'"';
          }
           ?>>
        </div>
        <div class="l-clearer">
        </div>
      </div>
      <div class="l-info-item">
        <label>Địa chỉ</label>
        <input type="text" class="l-input l-input-long" name="address"
        <?php
        if (isset($this->address)) {
          echo 'value="'. $this->address .'"';
        }
         ?>>
      </div>
    </div>
    <!-- Thong tin khac -->
    <div class="l-info-box">
      <h3 class="l-title">Thông tin khác</h3>
      <div class="l-info-item">
        <div class="l-info-item-col-3">
          <label>Số tầng</label>
          <input type="text" class="l-input" name="number_of_floor"
          <?php
          if (isset($this->numOfFloor)) {
            echo 'value="'. $this->numOfFloor .'"';
          }
           ?>>
        </div>
        <div class="l-info-item-col-3">
          <label>Số phòng</label>
          <input type="text" class="l-input" name="number_of_room"
          <?php
          if (isset($this->numOfRoom)) {
            echo 'value="'. $this->numOfRoom .'"';
          }
           ?>>
        </div>
        <div class="l-info-item-col-3">
          <label>Số toilet</label>
          <input type="text" class="l-input" name="number_of_restroom"
          <?php
          if (isset($this->numOfRestroom)) {
            echo 'value="'. $this->numOfRestroom .'"';
          }
           ?>>
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
        <input type="text" class="l-input l-input-long" name="title"
        <?php
        if (isset($this->title)) {
          echo 'value="'. $this->title .'"';
        }
         ?>>
      </div>
      <div class="l-info-item">
        <label>Nội dung mô tả</label> <span class="l-required">(*)</span>
        <span class="l-required" id="err-description">
        <?php echo (isset($this->errDescription)) ? $this->errDescription : ''; ?>
        </span>
        <textarea class="l-input l-input-long" rows="10" cols="30" name="description"><?php
        if (isset($this->description)) {
          echo $this->description;
        }
         ?></textarea>
      </div>
      <div class="l-info-item">
        <label>Cập nhật hình ảnh</label>
        <p class="l-input-required">
          (Bạn có thể nhập tối đa 1 ảnh và mỗi ảnh nặng không quá 4MB)
        </p>
        <div class='d-image-input-wrapper'>
          <input name='image' img-max-height="500" img-max-width="1200" class='d-image-input pending' type='text'/>
        </div>
        <?php
        if (isset($this->picture1Id)) {
          echo "<img class='d-image-img pending' image-id='$this->picture1Id' img-max-width='1200' img-max-height='500' />";
        }
         ?>

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
      <?php
      if (isset($this->isEditMode) && $this->isEditMode == true) {
        $name = 'update';
        $value = 'Cập nhật';
      } else {
        $name = 'create';
        $value = 'Đăng tin';
      }

      echo '<input type="submit" name="'.$name.'" value="'.$value.'" class="l-input l-btn-primary">'
       ?>

    </div>
  </form>

</div>
