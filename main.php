<?php $page = "main"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
  if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
    // 모바일 브라우저라면  모바일 URL로 이동 
    header("Location: ./m.index.php");
    exit;
  }
}
?>
<?php include_once('./head.php'); ?>
<?php
  $result = sql_select('SELECT * FROM banner_file ')
  ?>
  <div class="main">
    <div class="search-form">
      <div class="where-top">
        <div class="where">
          <div style="color:#504f57;">
            <b>찾으시는 곳</b>이<br>
            있으신가요?
          </div>
        </div>
        <div class="where-form">
          <div style="display:flex; margin-left:200px;">
            <div class="input-form">
              <div style="position:relative">
                <div id="address-select">지역 선택</div>
                <div class="address">
                  <div id="address_text">지역 선택</div>
                  <?php foreach($a_list as $row){ ?>
                  <div class="address_text"><?=$row[address]?></div>
                  <?php } ?>
                </div>
              </div>
              <div style="position:relative">
                <div id="food-select">음식 선택</div>
                <div class="food">
                  <div id="food_text">음식 선택</div>
                  <?php foreach($f_list as $row){ ?>
                  <div class="food_text"><?=$row[food]?></div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div id="s_btn" onclick="s_get()">SEARCH</div>
          </div>
        </div>
      </div>
    </div>
    <div style="display:flex; padding:1em 0;">
      <div class="owl-carousel owl-theme" >
        <?php
          foreach($result as $rows){
        ?>
        <div class="item" style="width:1200px; margin:0 0.5em;" data-id="<?=$rows[id]?>" onclick="click_main_banner(this,'<?=$rows[url]?>')">
          <img src='<?=$rows[banner_file]?>'>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <script>
    function click_main_banner(element,url){
      var clicked = $(element).attr("data-id");
      var max = 0
      $(".item").each(function(){ max = $(this).attr("data-id") > max ? $(this).attr("data-id") : max })

      if($(element).parent().hasClass("center")){
        window.location=url
      }else{
        var center = $(".center .item").attr("data-id")
        console.log(center, max, clicked)
        if(center == 1 && clicked == max){
          return $(".owl-prev").click()
        }
        if(center == max && clicked == 1){
          return $(".owl-next").click()
        }
        if(center > clicked){
          $(".owl-prev").click()
        }else{
          $(".owl-next").click()
        }
      }
    }
  </script>
<?php include_once('./footer.php'); ?>