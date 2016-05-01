<!-- Start of Search bar -->
<div class="m-search-wrapper">
  <form class="well form-search" >
    <div class="m-container">
      <input type="text" class="span3 search-query m-form-search-custom" placeholder="Search ..." id="m-form-search">
      <a href="search.html" class="btn btn-success l-btn-primary">Search</a>
      <!-- List options -->
      <ul class = "nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span data-role="facet-label">Giá Nhà</span><i class="caret"></i>
          </a>
          <div class="dropdown-menu" style="background-color:white">
            <div class="row m-row">
              <div class="col-md-5">
                <div class="facet-Giá-wrap">
                  <div class="input-group facet-Giá-input">
                    <span class="input-group-addon">vnd</span>
                    <input type="text" pattern="\d*" class="form-control" placeholder="No Min" maxlength="11" size="11" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-1 m-icon"><span class="glyphicon glyphicon-menu-right"></span></div>
              <div class="col-md-6">
                <div class="facet-Giá-wrap">
                    <div class="input-group facet-Giá-input">
                      <span class="input-group-addon">vnd</span>
                      <input type="text" pattern="\d*" class="form-control" placeholder="No Max"  maxlength="11" size="11" value="">
                    </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row m-row">
              <p>200.000 vnd</p>
              <p>500.000 vnd</p>
              <p>1.000.000 vnd</p>
              <p>2.000.000 vnd</p>
              <p>5.000.000 vnd</p>
              <p>Bất kỳ</p>
            </div>
          </div>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span data-role="facet-label">Giường Ngủ</span><i class="caret"></i>
          </a>
            <ul class="dropdown-menu" style="background-color:white">
                <li><a href="#">Bất kỳ</a></li>
                <li><a href="#">1+</a></li>
                <li><a href="#">2+</a></li>
                <li><a href="#">3+</a></li>
                <li><a href="#">4+</a></li>
                <li><a href="#">5+</a></li>
            </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span data-role="facet-label">Phòng Tắm</span><i class="caret"></i>
          </a>
            <ul class="dropdown-menu" style="background-color:white">
                <li><a href="#">Bất Kỳ</a></li>
                <li><a href="#">1+</a></li>
                <li><a href="#">2+</a></li>
                <li><a href="#">3+</a></li>
                <li><a href="#">4+</a></li>
                <li><a href="#">5+</a></li>
            </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span data-role="facet-label">Nâng Cao</span><i class="caret"></i>
          </a>
            <div class="dropdown-menu" style="background-color:white">
              <div class="row m-container">
                <div class="col-md-3">
                  <h4>Loại Bất Động Sản</h4>
                  <input type="radio" name="property_type" value="pt0" checked> Bất Kỳ<br>
                  <hr>
                  <input type="radio" name="property_type" value="pt1"> Gia Đình Đơn<br>
                  <input type="radio" name="property_type" value="pt2"> Condos/Townhomes/Co-Ops<br>
                  <input type="radio" name="property_type" value="pt3"> Nhà Di Động<br>
                  <input type="radio" name="property_type" value="pt4"> Trang Trại<br>
                  <input type="radio" name="property_type" value="pt5"> Đất Trống<br>
                  <input type="radio" name="property_type" value="pt6"> Chung Cư<br>
                </div>
                <div class="col-md-3">
                  <h4>Hiển Thị</h4>
                  <input type="radio" name="show_me" value="sm0" checked> Hiển Thị Tất Cả<br>
                  <hr>
                  <input type="radio" name="show_me" value="sm1"> Hiển Thị Mới Nhất<br>
                  <input type="radio" name="show_me" value="sm2"> Mới Xây Dựng<br>
                  <input type="radio" name="show_me" value="sm3"> Nhà Mở<br>
                  <input type="radio" name="show_me" value="sm4"> Tiết Kiệm Giá<br>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <b>Bị Tịch Thu</b><br>
                        <input type="radio" name="show_me_foreclosures" value="smf0" checked>Có Bao Gồm<br>
                        <input type="radio" name="show_me_foreclosures" value="smf1"> Hiện<br>
                        <input type="radio" name="show_me_foreclosures" value="smf2"> Ẩn<br>
                    </div>
                    <div class="col-md-6">
                      <b>Đang Giải Quyết</b><br>
                        <input type="radio" name="show_me_pending" value="smp0" checked> Có Bao Gồm<br>
                        <input type="radio" name="show_me_pending" value="smp1"> Ẩn<br>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <h4>Kích Cỡ Nhà</h4>
                  <select name="h_size" style="width:70%">
                    <option value="1"  >Bất Kỳ</option>
                    <option value="2"  >50+ m2</option>
                    <option value="3"  >70+ m2</option>
                    <option value="4"  >100+ m2</option>
                  </select>
                  <br><br><br>
                  <h4>Kích Cỡ Sân</h4>
                  <select name="h_size" style="width:70%">
                    <option value="1"  >Bất Kì</option>
                    <option value="2"  >10+ m2</option>
                    <option value="3"  >20+ m2</option>
                    <option value="4"  >40+ m2</option>
                  </select>
                  <br><br><br>
                  <h4>Tuổi Nhà</h4>
                  <select name="h_size" style="width:70%">
                    <option value="1">Bất Kỳ</option>
                    <option value="2">2+ năm</option>
                    <option value="3">5+ năm</option>
                    <option value="4">10+ năm</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <h4>Mở Rộng Khu Vực</h4>
                  <select name="h_size" style="width:70%">
                    <option value="1">0 km</option>
                    <option value="2">1 km</option>
                    <option value="3">5 km</option>
                    <option value="4">10 km</option>
                  </select>
                  <br><br><br>
                  <h4>Sắp Tới</h4>
                  <p>Tìm cách để mở rộng tìm kiếm nhà của bạn thêm nữa? Chúng tôi sẽ có tất cả các bộ lọc tìm kiếm chi tiết để hướng dẫn và truyền cảm hứng cho bạn thật sớm!</p>
                </div>
              </div>
              <hr>
              <div style="text-align:center">
              <button type="button" class="btn btn-success l-btn-primary">Kết Quả</button>
              <button type="button" class="btn">Hủy</button>
              <br>
              <br>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </form>
</div>
<!-- end of search form-->

<!-- Start of search result + left detail -->
<div class="m-container">
  <div class="row m-search-overview">
  <div class="col-md-9 m-config-search-result">
    <h2 style="color:#bd1000;text-align:center;">Đăng tin bất động sản</h2>

    <div class="l-info-box">
      <h3 class="l-title">Thông tin cơ bản</h3>
      <div class="l-info-item">
        <label>Loại nhà đất</label>
        <select class="l-input l-input-select" name="loainhadat">
          <option value="-1">-- Chọn loại nhà đất --</option>
          <?php
          foreach ($this->lstTypeOfHouse as $key => $element) {
            $id = $element['id'];
            $name = $element['name'];
            echo "<option value='$id'>-- $name --</option>";
          }
           ?>
        </select>
      </div>
      <div class="l-info-item">
        <label>Vị trí</label>
        <select class="l-input l-input-select" name="quanhuyen" id="district">
          <option value="-1">-- Chọn Quận/Huyện --</option>
          <?php
          foreach ($this->lstDistrict as $key => $element) {
            $id = $element['id'];
            $name = $element['name'];
            echo "<option value='$id'>-- $name --</option>";
          }
           ?>
        </select>
        <select class="l-input l-input-select" name="phuongxa" id="ward">
          <option value="-1">-- Chọn Phường/Xã --</option>
        </select>
        <select class="l-input l-input-select" name="duongpho" id="street">
          <option value="-1">-- Chọn Đường/Phố --</option>
        </select>
        <select class="l-input l-input-select" name="loaiduan">
          <option value="-1">-- Chọn loại dự án --</option>
        </select>
      </div>
      <div class="l-info-item">
        <div class="l-info-item-col-3">
          <label>Giá</label>
          <input type="text" name="gia" class="l-input">
        </div>
        <div class="l-info-item-col-3">
          <label>Đơn vị</label>
          <select class="l-input" name="donvi">
            <option value="-1">-- Thỏa thuận --</option>
          </select>
        </div>
        <div class="l-info-item-col-3">
          <label>Diện tích</label>
          <input type="text" name="dientich" class="l-input">
        </div>
        <div class="l-clearer">
        </div>
      </div>
      <div class="l-info-item">
        <label>Địa chỉ</label>
        <input type="text" name="diadiem" value="" class="l-input l-input-long">
      </div>
    </div>
    <!-- Thong tin khac -->
    <div class="l-info-box">
      <h3 class="l-title">Thông tin khác</h3>
      <div class="l-info-item">
        <div class="l-info-item-col-3">
          <label>Mặt tiền</label>
          <input type="text" name="mattien" class="l-input">
        </div>
        <div class="l-info-item-col-3">
          <label>Đường trước nhà</label>
          <input type="text" name="duongtruocnha" class="l-input">
        </div>
        <div class="l-info-item-col-3">
          <label>Hướng BĐS</label>
          <select class="l-input" name="huongbds">
            <option value="-1">KXĐ</option>
          </select>
        </div>
        <div class="l-clearer">
        </div>
      </div>
      <div class="l-info-item">
        <div class="l-info-item-col-3">
          <label>Số tầng</label>
          <input type="text" name="sotang" class="l-input">
        </div>
        <div class="l-info-item-col-3">
          <label>Số phòng</label>
          <input type="text" name="sophong" class="l-input">
        </div>
        <div class="l-info-item-col-3">
          <label>Số toilet</label>
          <input type="text" name="sotoilet" class="l-input">
        </div>
        <div class="l-clearer">
        </div>
      </div>
    </div>
    <!-- Mo ta chi tiet -->
    <div class="l-info-box">
      <h3 class="l-title">Mô tả chi tiết</h3>
      <p class="l-input-required">(Vui lòng gõ tiếng Việt có dấu để tin đăng được kiểm duyệt nhanh hơn)</p>
      <div class="l-info-item">
        <label>Tiêu đề</label>
        <input type="text" name="diadiem" value="" class="l-input l-input-long">
      </div>
      <div class="l-info-item">
        <label>Nội dung mô tả</label>
        <textarea name="noidungmota" rows="10" cols="30" class="l-input l-input-long">
        </textarea>
      </div>
      <div class="l-info-item">
        <label>Cập nhật hình ảnh </label>
        <p class="l-input-required">(Bạn có thể nhập tối đa 6 ảnh và mỗi ảnh nặng không quá 4MB)</p>
        <input type="file" name="file">
      </div>
    </div>
    <!-- Thong tin lien he -->
    <div class="l-info-box">
      <h3 class="l-title">Thông tin liên hệ</h3>
      <div class="l-info-item">
        <label>Họ tên</label>
        <input type="text" name="hoten" value="" class="l-input l-input-long">
      </div>
      <div class="l-info-item">
        <label>Địa chỉ</label>
        <input type="text" name="diachi" value="" class="l-input l-input-long">
      </div>
      <div class="l-info-item">
        <label>Điện thoại</label>
        <input type="text" name="dienthoai" value="" class="l-input l-input-long">
      </div>
      <div class="l-info-item">
        <label>Di động</label>
        <input type="text" name="didong" value="" class="l-input l-input-long">
      </div>
      <div class="l-info-item">
        <label>Email</label>
        <input type="text" name="email" value="" class="l-input l-input-long">
      </div>
    </div>

    <div class="l-btnsubmit">
      <input type="submit" name="submit" value="Đăng tin" class="l-input l-btn-primary">
    </div>

  </div>
  <!--start col-md-3-->
  <div class="col-md-3 ">
    <div class="row" style="margin-left:5px">
      <hr class="horizontal-line" />
      <h3 style="margin:0; margin-bottom:5px;">Tp. HCM, Quận 10</h3>
      <a href="#" class="pull-right" style="color:orange">Tìm Hiểu Thêm <span class="glyphicon glyphicon-send"></span></a>
      <br>
      <br>
    </div>
    <div class="row" style="margin-left:5px">
      <div class="pull-left" style="">
        Giá Trung Bình
        <p style="font-size:25px;">7 Triệu</p>
      </div>
      <div class="pull-right">
        Giá Trung Bình/m2
        <p style="font-size:25px;">1,2 Triệu</p>
      </div>
      <a href="#" class="pull-left" style="color:orange">Nhà ở Quận 10 <span class="glyphicon glyphicon-send"></span></a>
      <br>
    </div>
    <div class="row" style="margin-left:5px">
      <div class="col-md-4" style="padding:0; margin-bottom:10px;">
        <img src="<?php echo URL; ?>public/images/house_example.jpg" alt="" style="width:100%; height:100%;" />
      </div>
      <div class="col-md-4" style="padding:0; margin-left:4px; margin-bottom:10px;">
        <img src="<?php echo URL; ?>public/images/house_example.jpg" alt="" style="width:100%; height:100%" />
      </div>
      <div class="col-md-2" style="padding:0; margin-left:4px; margin-bottom:10px;">
        <img src="<?php echo URL; ?>public/images/house_example.jpg" alt="" style="width:100%; height:100%" />
      </div>
    </div>
    <div class="row" style="margin-left:5px; margin-top:5px;">
      <p>Phổ Biến</p>
      <div class="pull-left m-list-a-tag">
        <a href="#">Mới Cập Nhật</a><br>
        <a href="#">Tiết Kiệm</a><br>
        <a href="#">Cửa Sông/Biển</a><br>
        <a href="#">Nhà Đơn</a><br>
      </div>
      <div class="pull-right m-list-a-tag">
        <a href="#">Nhà Mở</a><br>
        <a href="#">Hồ Bơi</a><br>
        <a href="#">Nhà Để Xe</a><br>
        <a href="#">Nơi Để Thuyền</a><br>
      </div>
    </div>
    <div class="row" style="margin-left:5px; margin-top:5px;">
      <hr class="horizontal-line" />
      <h5><b>Nhà Nào Phù Hợp Với Bạn?</b></h5>
      Tính Toán Tiền Hàng Tháng Dựa Trên:<br>
      <br>
      <div class="pull-left m-ul-li-mod" style="width:50%">
        <ul>
          <li>Thu Nhập</li>
          <li>Số Sợ</li>
        </ul>
      </div>
      <div class="pull-right m-ul-li-mod" style="width:50%">
        <ul>
          <li>Đặt Cọc</li>
          <li>Vay Thế Chấp</li>
        </ul>
      </div>
      <button class="btn btn-success l-btn-primary center-block" style="width:100%;"><b>Kiểm Tra</b></button>
    </div>
    <div class="row" style="margin-left:5px; margin-top:5px;">
      <hr class="horizontal-line" />
      <div class="pull-left">
        <p style="font-size:20px;"><b>Cách Mua</b></p>
      </div>
      <div class="pull-right">
        <a href="#" style="color:orange">Xem Thêm <span class="glyphicon glyphicon-send"></span></a>
      </div>
      <div class="center-block">
        <iframe src="https://www.youtube.com/embed/gqOEoUR5RHg" style="width:100%"></iframe>
      </div>
      <b>Cách Mua Nhà Tại MBNĐ</b>
      <p>
        Mua nhà đơn giản và tiện lợi với MBNĐ!
      </p>
    </div>
      <div class="row" style="margin-left:5px; margin-top:5px;">
        <hr class="horizontal-line" />
        <div class="panel-group" id="accordion" >
          <div class="panel panel-default" style="border:0">
            <div class="panel-heading" style="background-color:white; padding-left:0">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                  <span class="glyphicon glyphicon-plus"></span>
                Khu Dân Lân Cận</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
              <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat.
              </div>
            </div>
          </div>
          <div class="panel panel-default" style="border:0">
            <div class="panel-heading" style="background-color:white; padding-left:0">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                  <span class="glyphicon glyphicon-plus"></span>
                Gần Số Nhà</a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
              <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat.</div>
            </div>
          </div>
          <div class="panel panel-default" style="border:0">
            <div class="panel-heading" style="background-color:white; padding-left:0">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                  <span class="glyphicon glyphicon-plus"></span>
                Gần Thành Phố</a>
              </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
              <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat.</div>
            </div>
          </div>
          <div class="panel panel-default" style="border:0">
            <div class="panel-heading" style="background-color:white; padding-left:0">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                  <span class="glyphicon glyphicon-plus"></span>
                Gần Tỉnh</a>
              </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
              <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat.</div>
            </div>
          </div>
          <div class="panel panel-default" style="border:0">
            <div class="panel-heading" style="background-color:white; padding-left:0">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                  <span class="glyphicon glyphicon-plus"></span>
                Thêm Phòng Ngủ</a>
              </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse">
              <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat.</div>
            </div>
          </div>
          <div class="panel panel-default" style="border:0">
            <div class="panel-heading" style="background-color:white; padding-left:0">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                  <span class="glyphicon glyphicon-plus"></span>
                Thêm Loại Nhà</a>
              </h4>
            </div>
            <div id="collapse6" class="panel-collapse collapse">
              <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat.</div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="margin-left:5px; margin-top:5px; margin-bottom:50px;">
        <hr class="horizontal-line" />
        <h4>Tính Toán Phí Di Chuyển</h4>
        <div class="pull-left" style="width:40%">
          <b>Đi Từ</b>
          <form class="" action="index.html" method="post">
            <input type="text" name="zipcodefrom" size="8" placeholder="Zip Code" class="l-input">
          </form>
        </div>
        <div class="pull-right" style="width:40%">
          <b>Đến</b>
          <form class="" action="index.html" method="post">
            <input type="text" name="zipcodeto" size="8" placeholder="Zip Code" class="l-input">
          </form>
        </div>
        <br><br><br>
        <div class="pull-left" style="width:40%">
          <b>Kích Cỡ Nhà</b>
          <select style="width:90%" class="l-input">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="opel">Opel</option>
            <option value="audi">Audi</option>
          </select>
        </div>
        <div class="pull-right" style="width:40%">
          <b>Gói</b>
          <select style="width:90%" class="l-input">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="opel">Opel</option>
            <option value="audi">Audi</option>
          </select>
        </div>

        <input type="button" name="calculate" value="Tính Toán" class="btn btn-warning l-btn-primary" style="margin-top:10px;">
      </div>

    </div> <!-- end of detail left-->
  <!-- end col-md-3-->
  </div>
</div>
<!-- End of serch result-->
