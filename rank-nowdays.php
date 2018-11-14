<?php $page="ranking-nowdays"; ?>

<?php include_once("./head.php") ?>
    <div class="main">
      <div class="title" style="margin-bottom:30px;">
        <div class="thismonth" onclick="location.href='./rank-thismonth.php'">
          이 달의<br><b>핫플레이스</b>
        </div>
        <div class="nowdays" onclick="location.href='./rank-nowdays.php'">
          요즘 뜨는<br><b>핫플레이스</b>
          <div class="margin"></div>
        </div>
        <div class="theme" onclick="location.href='./rank.php'">
          테마<br><b>핫플레이스</b>
        </div>
      </div>     
      <div class="rank-area">
        <div class="ranking5">
          <?php 
            for($i=0; $i<5; $i++){ 
          ?>
          <div class="ranking-store">
            <div class="rank-num"><?php
              $number = '';
              $number = (string)'0'+(string)($i+1);
              echo $number;
             ?></div>
            <div class="store-img">
              <img src="./images/foodimg3.jpeg" onclick="location.href='detail.php'" />
            </div>
            <div style="display:flex; flex-direction:column; padding-left: 10px; padding-bottom: 5px;">
              <div class="name"  onclick="location.href='detail.php'" >건대 소두마리</div>
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
            $number = '';
            if($i<10) {
              $number = '0'+(string)($i+1);
              echo $number;
            }else{
              echo $i;
            }
            ?></div>
            <div class="store-img">
              <img src="./images/77.77.jpeg" />
            </div>
            <div style="display:flex; flex-direction:column; padding-left: 10px;">
              <div class="name">건대 소두마리</div>
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
  
<?php include_once("./footer.php") ?>