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
      <div class="owl-carousel owl-theme">
        <div class="item" style="width:1200px;">
          <img src="./images/foodimg3.jpeg" onclick="location.href='./news.php'">
        </div>
        <div class="item" style="width:1200px;">
          <img src="./images/foodimg2.jpeg" onclick="location.href='./news.php'">
        </div>
        <div class="item" style="width:1200px;">
          <img src="./images/foodimg1.jpeg" onclick="location.href='./news.php'">
        </div>
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
          <form class="form" method="POST" action="search.php">
            <div class="search-word">
              <input type="text" id="search-word" name="search" placeholder="가고싶은 지역을 입력해주세요. Ex)강남" />
              <img id="search" src="./images/search.png" onclick="submit()"/>
            </div>
            <button id="search-btn">SEARCH</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include_once('./footer.php'); ?>