<?php $page = "news" ?>
<?php
$data =
["01. 망원동 즉석 우동<br>
망원동에 누가 봐도 즉석우동을 파는 곳이 있다. '망원동즉석우동'이 바로 그 주인공이다.<br>
망원동에서 우동 맛집으로 워낙 유명한 곳인지라 근처에 살거나 우동 매니아라면 한 번쯤 들어봤을 법한 곳이다.<br>
새벽 늦은 시간에도 우동을 먹으러 오는 해장 손님들이 많으며, 가끔은 밤 늦은 시간에도 줄을 서서 기다려야…<br>",
];
//글자수제한
function simpl_str($string,$limit_length) {
  $string_length = strlen( $string );
  if ( $limit_length <= $string_length ) {
    $string = mb_substr( $string, 0, $limit_length )."...";
    $han_char = 0;
    for ( $i = $limit_length-1; $i>=0; $i-- ) {
      $lastword = ord( substr( $string, $i, 1 ) );
      if ( 127 > $lastword ) break;
      else $han_char++;
    }
    if ( $han_char%2 == 1 ) $string = mb_substr( $string, 0, $limit_length-1 ) . "...";
  }
  return $string;
}
?>
<?php include_once("./m.head.php") ?>
<?php
  // 매거진 번호로 구분
  //$news_num = "SELECT * FROM news WHERE id"; 
  // ?title=<php echo $news_num;>
 ?>
  <div class="main">
    <div class="news-list">
      <div class="list-item">
        <div class="news-picture" onclick="location.href='./m.news_detail.php?data-id=1'">
          <img src="./images/main_banner/android/whereit_img_m.main_001.png" />
        </div>
        <div class="news-info">
          <div class="news-date">
            2018.12.14
          </div>
          <div class="news-title">
            [어디지도] 강남 햄버거 지도
          </div>
          <div class="news-content">
            <!--데이터 교체 필요-->
            서울에서 즐기는 미국 감성. 역삼, 신사, 봉천동의 수제버거 맛집을 알려드립니다. 
          </div>
        </div>
      </div>
      <div class="list-item">
        <div class="news-picture" onclick="location.href='./m.news_detail.php?data-id=2'">
          <img src="./images/main_banner/android/whereit_img_m.main_002.png" />
        </div>
        <div class="news-info">
          <div class="news-date">
            2018.12.14
          </div>
          <div class="news-title">
            [맛집을 여행하는 히치하이커를 위한 안내서] 우동이 맛있는 BEST5
          </div>
          <div class="news-content">
          <?=simpl_str($data[0],52)?> 
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
  // var limit = 3
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
  <div class="list-item">
    <div class="news-picture">
      <img src="./images/m_cafe1.jpg" />
    </div>
    <div class="news-info">
      <div class="news-date">
        2018.08.09
      </div>
      <div class="news-title">
        강남역 인근에서 풀코스로 놀기
      </div>
      <div class="news-content">
       <?=simpl_str($data[0],52)?> 
      </div>
    </div>
  </div>
</script>

<?php include_once("./m.footer.php") ?>