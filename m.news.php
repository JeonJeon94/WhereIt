<?php $page = "news" ?>

<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="news-list">
      <div class="list-item">
        <div class="news-picture">
          <img src="./images/cafe1.jpg" />
        </div>
        <div class="news-info">
          <div class="news-date">
            2018.08.09
          </div>
          <div class="news-title">
            강남역 인근에서 풀코스로 놀기
          </div>
          <div class="news-content">
            인파가 많은 강남역의 큰길은 프렌차이즈 업체들이 즐비해있다.
            언제나 새롭고 맛있는 곳을 추구하는 인스타그래머들은 강남역에서
            어디를 갈까? 추억을 남길 수 있는 장소를 레모네이드가 찾아 보았다.
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
    <div class="news-picture">
      <img src="./images/cafe1.jpg" />
    </div>
    <div class="news-info">
      <div class="news-date">
        2018.08.09
      </div>
      <div class="news-title">
        강남역 인근에서 풀코스로 놀기
      </div>
      <div class="news-content">
        인파가 많은 강남역의 큰길은 프렌차이즈 업체들이 즐비해있다.
        언제나 새롭고 맛있는 곳을 추구하는 인스타그래머들은 강남역에서
        어디를 갈까? 추억을 남길 수 있는 장소를 레모네이드가 찾아 보았다.
      </div>
    </div>
  </div>
</script>

<?php include_once("./m.footer.php") ?>