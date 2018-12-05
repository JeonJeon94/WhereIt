<?php $page = "ranking-theme" ?>

<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="title">
      <div class="nowdays" onclick="location.href='./m.rank-nowdays.php'">
        요즘 뜨는<br><b>핫플레이스</b>
      </div>
      <div class="theme" onclick="location.href='./m.rank.php'">
        <b>테마</b><br>핫플레이스
        <div class="margin"></div>
      </div>
      <div class="thismonth" onclick="location.href='./m.rank-thismonth.php'">
        이 달의<br><b>핫플레이스</b>
      </div>
    </div>
    <div class="insta">
      <div class="insta-container">
        <div class="insta-tag">
          <div style="flex:0 1 auto;">
            <div class="insta-list">
              <div class="insta-text-h" style="padding-top:3px;"><a href="">#럽스타그램</a></div>
              <div class="insta-text" style="display:none; padding:3px 0;"><a href="">#럽스타그램</a></div>
              <div class="insta-text" style="display:none; padding-bottom:3px;"><a href="">#럽스타그램</a></div>
            </div>
          </div>
        </div>
        <div class="insta-btn">
          <img id="in-down_bt" src="./images/rank_down.png" />
          <img id="in-up_bt" src="./images/rank_up.png" />
        </div>
      </div> 
    </div>
    <div class="rank-area">
      <?php 
        for($i=0; $i<10; $i++){ 
      ?>
      <div class="ranking-store">
        <div class="store-info">
          <div class="rank-num"><?php
            if($i<9) {
              $_ = $i+1;
              $number = '0' . '' . $_;
              echo $number;
            }else{
              echo $i+1;
            }
          ?></div>
          <div class="store-name" onclick="location.href='detail.php?id=<?php echo $id; ?>'">
            건대 소두마리
          </div>
          <div style="display:flex;"> 
            <div class="keyword" style="margin-right: 10px;">
              강남구
            </div>
            <div class="keyword">
              카페
            </div>
          </div>
        </div>
        <div class="store-img">
          <img src="./images/cafe1.jpg"  onclick="location.href='m.detail.php?id=<?php echo $id; ?>'" />
        </div>
      </div>
      <?php
        } 
      ?>
    </div> 
  </div>
<?php include_once("./m.footer.php") ?>