<?php $page="ranking-theme"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.rank.php");
   exit;
 }
}
?>
<?php include_once("./head.php") ?>
    <div class="main">
      <div class="title">
        <div class="nowdays" onclick="location.href='./rank-nowdays.php'">
          요즘 뜨는<br><b>핫플레이스</b>
        </div>
        <div class="theme" onclick="location.href='./rank.php'">
          <b>테마</b><br>핫플레이스
          <div class="margin"></div>
        </div>
        <div class="thismonth" onclick="location.href='./rank-thismonth.php'">
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
        <div class="ranking5">
          <?php 
            for($i=0; $i<5; $i++){ 
          ?>
          <div class="ranking-store">
            <div class="rank-num"><?php
              $_ = $i+1;
              $number = '0' . '' . $_;
              echo $number; 
            ?></div>
            <div class="store-img">
              <img src="./images/foodimg1.jpeg" onclick="location.href='detail.php?id=<?php echo $id; ?>'" />
            </div>
            <div style="display:flex; flex-direction:column; padding-left: 10px; padding-bottom: 5px;">
              <div class="name"  onclick="location.href='detail.php?id=<?php echo $id; ?>'" >건대 소두마리</div>
              <div class="flex">
                <div class="keyword">
                  <div class="chile-flex-1;">강남구</div>
                </div>
                <div class="keyword">
                  <div class="chile-flex-1;">카페</div>
                </div>
              </div>
            </div>
          </div>
          <?php
            } 
          ?>
        </div>
        <div class="ranking10">
          <?php 
            for($i=5; $i<10; $i++){ 
          ?>
          <div class="ranking-store">
            <div class="rank-num"><?php
              if($i<9) {
                $_ = $i+1;
                $number = '0' . '' . $_;
                echo $number;
              }else{
                echo $i+1;
              }
            ?></div>
            <div class="store-img">
              <img src="./images/77.77.jpeg"  onclick="location.href='detail.php?id=<?php echo $id; ?>'" />
            </div>
            <div style="display:flex; flex-direction:column; padding-left: 10px;">
              <div class="name"  onclick="location.href='detail.php?id=<?php echo $id; ?>'" >건대 소두마리</div>
              <div class="flex">
                <div class="keyword">
                  <div class="chile-flex-1;">강남구</div>
                </div>
                <div class="keyword">
                  <div class="chile-flex-1;">카페</div>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  
<script>

  var rank = $('.ranking-store')
  
  $(document).ready(function(){
    for(var n=0; n < 10; n++){
      ani_load(n)
    }
  });

  function ani_load(n){
    setTimeout(function() {
      $(rank[n]).css('display','flex')
    }, n * 200);
  }

</script>

<?php include_once("./footer.php") ?>