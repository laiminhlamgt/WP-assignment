<!-- Duong Tran Begin : Demo -->
<!-- 1. input for upload image -->
<!-- 
description : 
1.1 vd nhu muon upload 1 tam hinh trong 1 bai post, de cai doan duoi trong cai form create post, sau do post cai form do, server se nhan $_POST['xyz'] chinh la id cua hinh, save vao bang post la ok. neu la edit hinh, thi de cai id hinh vao trong value truoc , vd nhu value='1'. 
1.2 img-max-height va img-max-width la 2 thong so de dieu chinh size hinh hien thi, co the khai bao 1 trong 2, hoac ko khai bao thi se hien thi theo original size -->
<p>phai dang nhap trc nha</p>

<div class='d-image-input-wrapper'>
  <input name='xyz' img-max-height="500" img-max-width="1200" class='d-image-input pending' type='text' value='1' />
</div>

<!-- 2. img tag for show image -->
<!-- 
description:
2.1 vd nhu muon hien thi hinh anh cua 1 bai post, de cai id hinh vao trong image-id ben duoi.
2.2 img-max-height va img-max-width la 2 thong so de dieu chinh size hinh hien thi (nhu 1.2)
 -->
<img class='d-image-img pending' image-id='1' img-max-width="1200" img-max-height="500"  />

<!-- Duong Tran End : Demo -->

<div class="d-container-fluid">
  <div class="d-banner-wrapper">
    <div id="banner-fade">
      <!-- start Basic Jquery Slider -->
      <ul class="bjqs">
        <li><div style="background-image:url('./public/images/image-home-1.jpg')"></div></li>
        <li><div style="background-image:url('./public/images/image-home-2.jpg')"></div></li>
        <li><div style="background-image:url('./public/images/image-home-3.jpg')"></div></li>
      </ul>
      <!-- end Basic jQuery Slider -->
    </div>
    <div class="d-banner-centered">
      <div class="d-banner-content">
        <div class="d-banner-big-content">
          Chào mừng bạn đến với HOME.VN
        </div>
        <div class="d-banner-small-content">
          Mua bán nhà đất tiện lợi an toàn
        </div>
        <div class="d-banner-search-wrapper">
          <div class="d-banner-search-options">
            <span>BÁN</span><span>THUÊ</span><span class="search-options-collapse">GẦN ĐÂY</span><span class="search-options-collapse">TẤT CẢ</span>
          </div>
          <div>
            <form id="search-form" action="search/search" method="get">
              <input id="txt-search" name="content" type="text" placeholder="Địa chỉ, Thành phố" style="color:#777"/><span><button id="btn-search" type="button" name="button"><i class="fa fa-search"></i><span hidden>&nbsp; TÌM</span></button></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- listing -->
<div class="d-listing-news">
  <div class="d-container">
    <div class="d-listing-news-container">
      <div class="small-text">Thông tin mới nhất tại</div>
      <div class="large-text">Ho Chi Minh City, 2016</div>
      <div class="small-text">cập nhật đến bạn</div>
      <div class="main-content">
        <div class="content-1" style="background-image:url('./public/images/house1.jpg');">
          <div class="content-wrapper">
            <div class="address">50 Tạ Uyên</div>
            <div class="price">$2,880,000</div>
          </div>
        </div>
        <div class="content-2" style="background-image:url('./public/images/house2.jpg');">
          <div class="content-wrapper">
            <div class="address">300 Lý Thường Kiệt</div>
            <div class="price">$2,880,000</div>
          </div>
        </div>
        <div class="content-3" style="background-image:url('./public/images/house3.jpg');">
          <div class="content-wrapper">
            <div class="address">99 Gia Phú</div>
            <div class="price">giá cả trao đổi</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- contact us -->
<div class="d-container-fluid" style="background-image:url('./public/images/contact-us.jpg');background-size: cover; background-attachment: fixed; background-position-y:center;">
  <div class="d-contact-us" >
    <h1>TƯ VẤN MIỄN PHÍ</h1>
    <h3>+84 909-207-207</h3>
    <div class="contact-us-button">LIÊN HỆ VỚI CHÚNG TÔI</div>
  </div>
</div>
