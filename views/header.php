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
          <a class="d-navbar-active" href="#">MUA</a>
          <i class="menu-icon fa fa-plus-circle" onclick="collapseContent('dMenuContent1',this)"></i>
          <div class="d-menu-content" id="dMenuContent1">
            <div class="d-menu-content-header">Mua Nhà Đất</div>
            <div class="d-menu-content-body">
              <div class="d-menu-content-body-child child-1">
                <h3 class="child-title">Mua Nhà</h3>
                <a href="#">Nhà Cấp 1</a>
                <a href="#">Nhà Cấp 2</a>
                <a href="#">Nhà Cấp 3</a>
                <a href="#">Nhà Cấp 4</a>
              </div>
              <div class="d-menu-content-body-child child-2">
                <h3 class="child-title">Mua Đất</h3>
                <a href="#">Đất Cấp 1</a>
                <a href="#">Đất Cấp 2</a>
                <a href="#">Đất Cấp 3</a>
                <a href="#">Đất Cấp 4</a>
              </div>
            </div>
          </div>
        </li>
        <li class="d-menu-haschild" >
          <a href="#">BÁN</a>
          <i class="menu-icon fa fa-plus-circle" onclick="collapseContent('dMenuContent2',this)"></i>
          <div class="d-menu-content" id="dMenuContent2">
            <div class="d-menu-content-header">Bán Nhà Đất</div>
            <div class="d-menu-content-body">
              <div class="d-menu-content-body-child child-1">
                <h3 class="child-title">Bán Nhà</h3>
                <a href="#">Nhà Cấp 1</a>
                <a href="#">Nhà Cấp 2</a>
                <a href="#">Nhà Cấp 3</a>
                <a href="#">Nhà Cấp 4</a>
              </div>
              <div class="d-menu-content-body-child child-2">
                <h3 class="child-title">Bán Đất</h3>
                <a href="#">Đất Cấp 1</a>
                <a href="#">Đất Cấp 2</a>
                <a href="#">Đất Cấp 3</a>
                <a href="#">Đất Cấp 4</a>
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
