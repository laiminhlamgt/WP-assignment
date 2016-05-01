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
