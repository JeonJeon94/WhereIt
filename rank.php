<?php $page="ranking"; ?>
<?php include_once("./head.php") ?>
<?php 

$name="이플로네의 하루입니다.";
?>
    <div class="main">
      <div class="title">
        <div class="nowdays" onclick="location.href='./rank.php?name=nowdays'">
          요즘 뜨는<br>핫플레이스
        </div>
        <div class="thema" onclick="location.href='./rank.php?name=thema'">
          테마<br>핫플레이스
        </div>
        <div class="thismonth" onclick="location.href='./rank.php?name=thismonth'">
          이 달의<br>핫플레이스
        </div>
      </div>
      <div class="insta">
        <div class="insta-tag">럽스타그램</div>
        <div>
          <img id="down_bt" style="display:block; padding: 5px;" src="./images/rank_down.png" />
          <img id="up_bt" style="display:none; padding: 5px;" src="./images/rank_up.png" />
        </div> 
      </div>      
      <div class="rank-area">
        <div class="ranking5">
          <?php 
            $overname=$name;
            if(strlen($name)>9){ 
              $overname = str_replace($name,mb_substr($name,0,9,"utf-8")."...",$name);
            }else{
              $overname = $name;
            }
            for($i=0; $i<5; $i++){ 
          ?>
          <div class="ranking-store">
            <div class="rank-num"><?php echo $i+1; ?></div>
            <div class="store-img">
              <img src="./images/77.77.jpeg" />
            </div>
            <div style="display:flex; flex-direction:column; padding-left: 10px;">
              <div class="name"><?php echo $overname; ?></div>
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
            $overname=$name;
            if(strlen($name)>9){ 
              $overname = str_replace($name,mb_substr($name,0,9,"utf-8")."...",$name);
            }else{
              $overname = $name;
            }
            for($i=5; $i<10; $i++){ 
          ?>
          <div class="ranking-store">
            <div class="rank-num"><?php echo $i+1; ?></div>
            <div class="store-img">
              <img src="./images/77.77.jpeg" />
            </div>
            <div style="display:flex; flex-direction:column; padding-left: 10px;">
              <div class="name"><?php echo $overname; ?></div>
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