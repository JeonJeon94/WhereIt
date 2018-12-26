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
  <div class="main">
    <div>
      <div class="owl-carousel owl-theme" >
        <?php
          // for($i=1; $i <= 2; $i++){
          //   $url = "./news_detail.php?data-id=$i";
          //   $banner = "./images/main_banner/whereit_img_main_00$i.png"
        ?>
        <div class="item" style="width:1200px; margin:0 0.5em;" data-id="1" onclick="click_main_banner(this,'')">
          <img src='./images/main_banner/web/whereit_img_main_01.png'>
        </div>
        <div class="item" style="width:1200px; margin:0 0.5em;" data-id="2" onclick="click_main_banner(this,'./rank.php?tag=와인')">
          <img src='./images/main_banner/web/whereit_img_main_009.png'>
        </div>
        <div class="item" style="width:1200px; margin:0 0.5em;" data-id="3" onclick="click_main_banner(this,'./news_detail.php?data-id=1')">
          <img src='./images/main_banner/web/whereit_img_main_001.png' >
        </div>
        <div class="item" style="width:1200px; margin:0 0.5em;" data-id="4" onclick="click_main_banner(this,'./news_detail.php?data-id=2')" >
          <img src='./images/main_banner/web/whereit_img_main_002.png' >
        </div>
        <?php //} ?>
      </div>
    </div>
    <div class="search-form">
      <div class="where-top">
        <div class="where">
          <div style="color:#504f57;">
            <b>찾으시는 곳</b>이<br>
            있으신가요?
          </div>
        </div>
        <div class="where-form">  
          <form class="form" method="GET" action="search.php">
            <div class="search-word">
              <input type="text" id="search-word" name="search" placeholder="<?=$b_text[search_b]?>" />
              <img id="search" src="./images/search.png" onclick="submit()"/>
            </div>
            <button id="search-btn">SEARCH</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function click_main_banner(element,url){
      var clicked = $(element).attr("data-id");
      var max = 0
      $(".item").each(function(){ max = $(this).attr("data-id") > max ? $(this).attr("data-id") : max })

      if($(element).parent().hasClass("center")){
        location.href=url;
      }else{
        var center = $(".center .item").attr("data-id")
        console.log(center, max, clicked)
        if(center == 0){
          if(clicked == max){
            return $(".owl-prev").click()
          }
        }
        if(center == max){
          if(clicked == 0){
            return $(".owl-next").click()
          }
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