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
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="news-list">
        <div class="list-item">
          <div class="item-picture">
            <img src="./images/cafe1.jpg" />
          </div>
          <div class="item-info">
            <div class="info-date">
              2018.08.02
            </div>
            <div class="theme-title">
              강남역 인근에서<br>풀코스로 놀기
            </div>
            <div class="text">
              인파가 많은 강남역의 큰길은 프렌차이즈 업체들이 즐비해있다.<br>
              언제나 새롭고 맛있는 곳을 추구하는 인스타그래머들은 강남역에서<br>
              어디를 갈까? 추억을 남길 수 있는 장소를 레모네이드가 찾아 보았다.
            </div>
            <div class="more" onclick="location.href='news_detail.php'">
              <div id="text">
                VIEW MORE
              </div>
              <img src="./images/more.png">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  var news_length = 0
  var limit = 3
  function news_fadein(n){
    if(n < limit){
      var slot_template = _.template($("#news-slot").html());
      try{
        $(".news-list").append( slot_template() )
      }catch(err){}
    }
  }
  function load(){
    setTimeout(function(){
      news_fadein(news_length);
      news_length ++
    }, 1000);
  }
  $(document).ready(function(){
    load()
  });
  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
      if(news_length <= limit){
        news_length +=1
        news_fadein(news_length)
      }
    }
  });
  
  
</script>

<script id="news-slot" type="text/template">
  <div class="list-item">
    <div class="item-picture">
      <img src="./images/cafe1.jpg" />
    </div>
    <div class="item-info">
      <div class="info-date">
        2018.08.02
      </div>
      <div class="theme-title">
        강남역 인근에서<br>풀코스로 놀기
      </div>
      <div class="text">
        인파가 많은 강남역의 큰길은 프렌차이즈 업체들이 즐비해있다.<br>
        언제나 새롭고 맛있는 곳을 추구하는 인스타그래머들은 강남역에서<br>
        어디를 갈까? 추억을 남길 수 있는 장소를 레모네이드가 찾아 보았다.
      </div>
      <div class="more">
        <div id="text">
          VIEW MORE
        </div>
        <img src="./images/more.png">
      </div>
    </div>
  </div>
</script>

</body>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
</html>