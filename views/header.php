<?php Session::init(); ?>

<div hidden class="d-bgcover"></div>
<div class="d-clearfix d-navbar-header">
  <div class="d-container">
    <div class="d-navbar-title">
      <button onclick="ToggleMenu()" class="d-navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo URL; ?>">
        <img src="<?php echo URL; ?>public/images/logo.png" alt="logo" />
      </a>
    </div>
    <div class="d-navbar-login">
      <ul class="d-clearfix d-navbar-right">
        <li>
          <?php
          $ref = URL . 'login';

          if (Session::get('loggedIn') == false) {
            $label = 'ĐĂNG NHẬP';

          } else {
            $label = 'THOÁT';
            $ref = $ref . '/logout';
          }

          echo '<a href="' . $ref . '">' . $label;
          ?>
          <i class="fa fa-sign-in"></i></a>
        </li>
      </ul>
    </div>
    <div id="navbarMenuDiv" class="d-navbar-menu d-navbar-menu-collapse">
      <ul class="d-clearfix d-navbar-left">
        <li class="d-menu-haschild">
          <!-- <a class="d-navbar-active">MUA</a> -->
          <a>MUA</a>
          <i class="menu-icon fa fa-plus-circle" onclick="collapseContent('dMenuContent1',this)"></i>
          <div class="d-menu-content" id="dMenuContent1">
            <div class="d-menu-content-header">Mua Nhà Đất</div>
            <div class="d-menu-content-body">
              <div class="d-menu-content-body-child child-1">
                <h3 class="child-title">Mua Nhà</h3>
                <a href="<?php echo URL; ?>search/search?stype-of-house=9">Căn hộ chung cư</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=10">Nhà riêng</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=11">Nhà mặt phố</a>
              </div>
              <div class="d-menu-content-body-child child-2">
                <h3 class="child-title">Khác</h3>
                <a href="<?php echo URL; ?>search/search?stype-of-house=12">Kho, nhà xưởng, đất</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=13">Khác</a>
              </div>
            </div>
          </div>
        </li>
        <li class="d-menu-haschild" >
          <a>THUÊ</a>
          <i class="menu-icon fa fa-plus-circle" onclick="collapseContent('dMenuContent2',this)"></i>
          <div class="d-menu-content" id="dMenuContent2">
            <div class="d-menu-content-header">Thuê Nhà Đất</div>
            <div class="d-menu-content-body">
              <div class="d-menu-content-body-child child-1">
                <h3 class="child-title">Thuê Nhà</h3>
                <a href="<?php echo URL; ?>search/search?stype-of-house=1">Căn hộ chung cư</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=2">Nhà riêng</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=3">Nhà mặt phố</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=5">Phòng trọ</a>
              </div>
              <div class="d-menu-content-body-child child-2">
                <h3 class="child-title">Khác</h3>
                <a href="<?php echo URL; ?>search/search?stype-of-house=4">Văn phòng</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=6">Cửa hàng</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=7">Kho, nhà xưởng, đất</a>
                <a href="<?php echo URL; ?>search/search?stype-of-house=8">Khác</a>
              </div>
            </div>
          </div>
        </li>
        <li>
          <a href="<?php echo URL; ?>help">TRỢ GIÚP</a>
          <div class="d-menu-content"></div>
        </li>
        <?php
        if (Session::get('loggedIn') == true) {
          $path = URL . 'search/mypage?userId=' . Session::get('userId');
          echo '<li>';
          echo '<a href="'.$path.'">TRANG CÁ NHÂN</a>';
          echo '<div class="d-menu-content"></div>';
          echo '</li>';

          $path = URL . 'post';
          echo '<li>';
          echo '<a href="'.$path.'">ĐĂNG TIN</a>';
          echo '<div class="d-menu-content"></div>';
          echo '</li>';
        }
         ?>
      </ul>
    </div>
  </div>
</div>
