<?php $page="magazine"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.news.php");
   exit;
 }
}
?>
<?php include_once('./head.php'); ?>
<?php

  $result = sql_select("SELECT * FROM contents");
  
  $last = sql_one("SELECT id FROM contents ORDER BY id DESC");
  $last_num = $last[id];
?>
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="news-list">
        <?php foreach($result as $rows){ ?>
        <div class="list-item">
          <div class="item-picture">
            <img src="<?=$rows[main]?>" />
          </div>
          <div class="item-info">
            <div class="info-date">
              <?=$rows[date]?>
            </div>
            <div class="theme-title">
              <?=$rows[title]?>
            </div>
            <div class="text">
              <?=$rows[text]?>
            </div>
            <div class="more" onclick="location.href='news_detail.php?data-id=<?=$rows[id]?>'">
              <div id="text">
                VIEW MORE
              </div>
              <img src="./images/more.png">
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

<script>

  var news = $('.list-item')
  
  $(document).ready(function(){
    for(var n=0; n < <?=$last_num?> ; n++){
      ani_load(n)
    }
  });

  function ani_load(n){
    setTimeout(function() {
      $(news[n]).css('display','flex')
    }, n * 900);
  }
</script>

</body>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
</html>