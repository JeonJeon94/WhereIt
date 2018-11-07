<?php $page = "search"; ?>
<?php include_once('./head.php'); ?>
<?php 

$name="핫플레이스 이름입니다"

?>
<?php include_once("./head.php") ?>
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="search-center">
        <div class="main-top">
          <div style="font-size: 2em;">
            <div>
              가장 인기있는<br>
              <b>핫플레이스</b>
            </div>
          </div> 
          <div class="search-time">
            <a id="all" href ="search.php">누적</a>
            <a id="recently" style="color:black; font-weight:bold; border-bottom:2px solid black; padding-bottom:2px;" href ="#">최근 1개월</a>
          </div>
        </div>
        <?php 
            $overname=$name;
          if(strlen($name)>9){ 
            $overname = str_replace($name,mb_substr($name,0,9,"utf-8")."...",$name);
          }else{
            $overname = $name;
          }
        ?>
        <div class="search-list">
          <div class="list-line">
            <?php for($i=0; $i < 12; $i++){ ?>
            <div class="store-list">
              <div class="img-container" onclick="location.href='./detail.php'">
                <img src="./images/food1.jpeg" />
              </div>
              <div class="flex" style="padding:8px 4px;">
                <div class="store-name"><?php echo $overname; ?></div>
                <div class="views">2.4k</div>
              </div>
              <div class="flex" style="padding-left: 4px;">
                <div class="keyword">
                  <div class="chile-flex-1;">강남구</div>
                </div>
                <div class="keyword">
                  <div class="chile-flex-1;">카페</div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>  
    </div>

<?php include_once('./footer.php'); ?>