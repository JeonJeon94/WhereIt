<?php $page="favorite" ?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div style="font-size:36px; color:#504f57; margin:40px 0 40px 40px;">
      <b>즐겨찾는</b><br>
      플레이스
    </div>
    <div class="favorite-list">
      <div class="list-line">
        <?php for($i=0; $i < 12; $i++){ ?>
        <div class="store-list">
          <div class="img-container" onclick="location.href='./m.detail.php'">
            <img src="./images/food1.jpeg" />
          </div>
          <div style="padding:5px 5px; display:flex;">
            <div class="store-name">건대 소두마리</div>
            <div class="views">2.4K</div>
          </div>
          <div style="padding-left:4px; display:flex;">
            <div class="keyword">
              <div>강남구</div>
            </div>
            <div class="keyword">
              <div>카페</div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php include_once("./m.footer.php") ?>