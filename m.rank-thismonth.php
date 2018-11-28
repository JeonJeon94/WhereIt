<?php $page = "ranking-thismonth" ?>

<?php include_once("./m.head.php") ?>

  <div class="main">
    <div class="title" style="margin-bottom:30px;">
      <div class="theme" onclick="location.href='./m.rank.php'">
        테마<br><b>핫플레이스</b>
      </div>
      <div class="thismonth" onclick="location.href='./m.rank-thismonth.php'">
        이 달의<br><b>핫플레이스</b>
        <div class="margin"></div>
      </div>
      <div class="nowdays" onclick="location.href='./m.rank-nowdays.php'">
        요즘 뜨는<br><b>핫플레이스</b>
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
          <div style="display:flex; flex:1; justify-content:flex-end;"> 
            <div class="keyword" style="margin-right: 20px;">
              강남구
            </div>
            <div class="keyword">
              카페
            </div>
          </div>
        </div>
        <div class="store-img">
          <img src="./images/cafe2.jpg"  onclick="location.href='m.detail.php?id=<?php echo $id; ?>'" />
        </div>
      </div>
      <?php
        } 
      ?>
    </div> 
  </div>
  
<?php include_once("./m.footer.php") ?>