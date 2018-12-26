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
            <img src="./images/main_banner/android/whereit_img_m.main_001.png" />
          </div>
          <div class="item-info">
            <div class="info-date">
              2018.12.14
            </div>
            <div class="theme-title">
              [어디지도] 강남 햄버거 지도
            </div>
            <div class="text">
              서울에서 즐기는 미국 감성. 역삼, 신사, 봉천동의 수제버거 맛집을 알려드립니다.
            </div>
            <div class="more" onclick="location.href='news_detail.php?data-id=1'">
              <div id="text">
                VIEW MORE
              </div>
              <img src="./images/more.png">
            </div>
          </div>
        </div>
        <div class="list-item">
          <div class="item-picture">
            <img src="./images/main_banner/android/whereit_img_m.main_002.png" />
          </div>
          <div class="item-info">
            <div class="info-date">
              2018.12.14
            </div>
            <div class="theme-title">
              [맛집을 여행하는 히치하이커를 위한 안내서] 우동이 맛있는 BEST5
            </div>
            <div class="text">
              01. 망원동 즉석 우동<br>
              망원동에 누가 봐도 즉석우동을 파는 곳이 있다. '망원동즉석우동'이 바로 그 주인공이다.<br>
              망원동에서 우동 맛집으로 워낙 유명한 곳인지라 근처에 살거나 우동 매니아라면 한 번쯤 들어봤을 법한 곳이다.<br>
              새벽 늦은 시간에도 우동을 먹으러 오는 해장 손님들이 많으며, 가끔은 밤 늦은 시간에도 줄을 서서 기다려야 한다.<br>
            </div>
            <div class="more" onclick="location.href='news_detail.php?data-id=2'">
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

  var news = $('.list-item')
  
  $(document).ready(function(){
    for(var n=0; n < 2; n++){
      ani_load(n)
    }
  });

  function ani_load(n){
    setTimeout(function() {
      $(news[n]).css('display','flex')
    }, n * 900);
  }
  // var news_length = 0
  // var limit = 2
  // function news_fadein(n){
  //   if(n < limit){
  //     var slot_template = _.template($("#news-slot").html());
  //     try{
  //       $(".news-list").append( slot_template() )
  //     }catch(err){}
  //   }
  // }
  // function load(){
  //   setTimeout(function(){
  //     news_fadein(news_length);
  //     news_length ++
  //   }, 1000);
  // }
  // $(document).ready(function(){
  //   load()
  // });
  // $(window).scroll(function() {
  //   if($(window).scrollTop() + $(window).height() == $(document).height()) {
  //     if(news_length <= limit){
  //       news_length +=1
  //       news_fadein(news_length)
  //     }
  //   }
  // });
  
  
</script>

<script id="news-slot" type="text/template">
  <!-- <div class="list-item">
    <div class="item-picture">
      <img src="./images/main_banner/web/whereit_img_m.main_002.png" />
    </div>
    <div class="item-info">
      <div class="info-date">
        2018.12.14
      </div>
      <div class="theme-title">
        [맛집을 여행하는 히치하이커를 위한 안내서]
      </div>
      <div class="text">
        [맛집을 여행하는 히치하이커를 위한 안내서] 우동이 맛있는 BEST5<br>
        01. 망원동 즉석 우동<br>
        망원동에 누가 봐도 즉석우동을 파는 곳이 있다. '망원동즉석우동'이 바로 그 주인공이다.<br>
        망원동에서 우동 맛집으로 워낙 유명한 곳인지라 근처에 살거나 우동 매니아라면 한 번쯤 들어봤을 법한 곳이다.<br>
        새벽 늦은 시간에도 우동을 먹으러 오는 해장 손님들이 많으며, 가끔은 밤 늦은 시간에도 줄을 서서 기다려야…<br>
      </div>
      <div class="more">
        <div id="text">
          VIEW MORE
        </div>
        <img src="./images/more.png">
      </div>
    </div>
  </div> -->
</script>

</body>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
</html>