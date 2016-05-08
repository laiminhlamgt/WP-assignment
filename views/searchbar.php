<div class="m-search-wrapper">
  <form class="well form-search" action="search/search">
    <div class="m-container">
      <!-- List options -->
      <div style="display: inline-block">
        <h4>Tìm kiếm nâng cao</h4>
        <select style="width:220px" name="stype-of-house">
          <option value="-1">-- Loại nhà đất --</option>
        </select>
        <select style="width:150px" name="sdistrict">
          <option value="-1">-- Quận/Huyện --</option>
        </select>
        <select style="width:150px" name="sward" id="sward">
          <option value="-1">-- Phường/Xã --</option>
        </select>
        <select style="width:200px" name="sstreet" id="sstreet">
          <option value="-1">-- Đường/Phố --</option>
        </select>
        <br>
        <select style="width:220px" name="sprice">
          <option value="-1">-- Giá cả --</option>
          <option value="1">< 1 triệu</option>
          <option value="3">1 - 3 triệu</option>
          <option value="5">3 - 5 triệu</option>
          <option value="10">5 - 10 triệu</option>
          <option value="30">10 - 30 triệu</option>
          <option value="50">40 - 50 triệu</option>
          <option value="100">50 - 100 triệu</option>
          <option value="0">> 100 triệu</option>
        </select>
        <select style="width:150px" name="sarea">
          <option value="0-0">-- Diện tích --</option>
          <option value="0-30"><= 30 m2</option>
          <option value="30-50">30 - 50 m2</option>
          <option value="50-80">50 - 80 m2</option>
          <option value="80-100">80 - 100 m2</option>
          <option value="100-150">100 - 150 m2</option>
          <option value="150-200">150 - 200 m2</option>
          <option value="200-250">200 - 250 m2</option>
          <option value="250-300">250 - 300 m2</option>
          <option value="300-500">300 - 500 m2</option>
          <option value="500-0">>= 500 m2</option>
        </select>
        <select style="width:150px" name="snum-of-room" id="sward">
          <option value="-1">-- Số phòng --</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
        <select style="width:200px" name="sproject" id="sstreet">
          <option value="-1">-- Dự án --</option>
        </select>
      </div>
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      <input name="content" type="text" class="span3 search-query m-form-search-custom" placeholder="Search ..." id="m-form-search">
      <input class="btn btn-success l-btn-primary" type="submit" value="Tìm kiếm">

    </div>
  </form>
</div>
