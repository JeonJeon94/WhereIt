<?php $page="detail"; ?>

<?php include_once('./head.php'); ?>
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="detail-main">
        <div class="main-top">
          <div class="photo">
            <img src="./images/food1.jpeg" />
          </div>
          <div class="info">
            <div class="flex" style="padding-bottom:15px;">
              <div class="keyword">
                <div class="child-flex-1">강남구</div>
              </div>
              <div class="keyword">
                <div class="child-flex-1">카페</div>
              </div>
            </div>
            <div class="name">
              이플로네의 하루
            </div>
            <div class="number">02-254-5485</div>
            <div class="adress">서울시 강남구 테헤란로 13길 83</div>
            <div class="hashtag">
              <div id="hashtag">#봉골레 파스타</div>
              <div id="hashtag">#연어샐러드</div>
              <div id="hashtag">#복숭아와인</div>
            </div>
          </div>
          <div class="etc">
            <div class="month">
              <div class="share">
                <img src="./images/share.png" />
                <div>월간 해시태그</div>
              </div>
              <div class="usage">
                <img src="./images/star.png" onclick="this.src='./images/star_active.png'"/>
                <div>사용량<br>2.55k</div>
              </div>
            </div>
            <div class="map">
              <img src="./images/map.png" onclick="this.src='./images/map_active.png'"/>
            </div>
          </div>
        </div>
        <div class="detail-picture">.
          <?php for($i=0; $i < 12; $i++){ ?>
          <div class="store-list">
            <div class="img-container" onclick="location.href='./detail.php'">
              <img src="./images/food1.jpeg" />
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include_once('./script/move_top_js.php'); ?>

</html>