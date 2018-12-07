<?php $page = "news" ?>
<?php
$data =
["인파가 많은 강남역의 큰길은 프렌차이즈 업체들이 즐비해있다.
언제나 새롭고 맛있는 곳을 추구하는 인스타그래머들은 강남역에서
어디를 갈까? 추억을 남길 수 있는 장소를 레모네이드가 찾아 보았다.",
];
//글자수제한
function simpl_str($string,$limit_length) {
  $string_length = strlen( $string );
  if ( $limit_length <= $string_length ) {
    $string = substr( $string, 0, $limit_length )."...";
    $han_char = 0;
    for ( $i = $limit_length-1; $i>=0; $i-- ) {
      $lastword = ord( substr( $string, $i, 1 ) );
      if ( 127 > $lastword ) break;
      else $han_char++;
    }
    if ( $han_char%2 == 1 ) $string = substr( $string, 0, $limit_length-1 ) . "...";
  }
  return $string;
}
?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="news-list">
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
            <!--데이터 교체 필요-->
            <?=simpl_str($data[0],138)?> 
          </div>
        </div>
      </div>
    </div>
    <div class="news-detail">
      <div class="main-photo">
        <img src="./images/m_cafe1.jpg" />
      </div>
      <div class="detail-date">
        2018.08.02
      </div>
      <div class="detail-title">
        강남역 인근에서 풀코스로 놀기
      </div>
      <div class="detail-text">
          아티스트 프루프 숍(이하 AP 숍)은 판화가 최경주의 실크스크린, 에칭, 페인팅 등 회화 작품과 이를 토대로 한 다양한 상품, 굿즈를 판매하는 쇼룸이다. 동시에 한 달에 한 번 트럼펫 연주자인 이동열이 그의 동료들과 라이브 연주를 하는 공연장이기도 하다. 부부인 두 사람이 이곳의 문을 연 건 지난해 3월. 최경주의 프린팅 레이블인 ‘아티스트 프루프’의 작업을 직접 보고 만지고 구매도 할 수 있는 물리적 공간이 있었으면 하는 바람에서 시작했다.
          “판매하는 상품은 모두 경주 씨 작업에서 파생됐기 때문에 한곳에 다 모여 있었으면 좋겠다고 생각했어요. 서로 어우러졌을 때 그 맥락이 보인다고 할까요. 예를 들어 이 꽃병을 온라인에서 소개한다면 어떤 회화 작품을 근간으로 하고 무엇을 나타내는지 구구절절 설명해야 하지만 이곳에 와서 보면 감각적으로 느낄 수 있는 거죠.” 이동열의 말처럼 AP 숍은 공간 자체가 지닌 힘이 크다.
          실제 공간은 작지만 천장이 높고 전면에 커다란 창이 있어 확 트인 느낌이며 가구와 집기류에는 최경주가 작품의 주요 모티브로 사용하는 도형과 기하학적 요소를 적극 활용했다.
          <br><br>
          공간 디자인을 맡은 COM과 전체적인 콘셉트부터 매대 높이, 스피커가 놓이는 위치 등 실질적인 부분에 이르기까지 꼼꼼하게 상의하며 완성한 결과다. 전면에 위치한 원형 테이블은 최경주와 디자이너 권의현이 함께 제작한 것으로 앞으로는 다양한 가구도 선보일 계획이다.이처럼 AP 숍은 다양한 분야의 디자이너는 물론 브랜드와의 협업에도 적극적이다. 가장 최근에는 패브릭 브랜드 키티버니포니와 베딩 세트, 커튼, 쿠션 등을 제작했고 그래픽 디자이너 양민영의 프로젝트 브랜드 스와치 서비스(Swatch Service)와 실험실 코트를 만들어 판매하기도 했다.
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
       <?=simpl_str($data[0],138)?> 
      </div>
    </div>
  </div>
</script>

<?php include_once("./m.footer.php") ?>