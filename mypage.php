<?php $page='mypage' ?>
<?php $NEED_LOGIN = true; ?>

<?php include_once('./head.php'); ?>
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="mypage">
        <div class="mypage-top">
          <div style="font-size: 36px; color:#504f57; font-family: 'Noto Sans KR', sans-serif;">
            <b>MY</b><br>
            페이지
          </div>
          <div class="my-list">
            <div class="favorite">
              <div class="favorite-text" onclick="location.href='./mypage.php'">
                즐겨찾기
              </div>
              <div class="margin"> </div>
            </div>
            <div class="user-info">
              <div class="user-info-text" onclick="location.href='./myinfo.php'">
                회원정보
              </div>
              <div class="margin"> </div>
            </div>
            <div class="use-rule">
              <div class="use-rule-text" onclick="location.href='./userule.php'">
                이용약관
              </div>
              <div class="margin"> </div>
            </div>
          </div>
        </div>
        <div class="favorite-list">
          <div class="list-line">
            <h2>즐겨찾기 된 상점이 없습니다.</h2>
            <?php for($i=0; $i < 12; $i++){ ?>
            <!-- <div class="store-list">
              <div class="img-container" onclick="location.href='./detail.php'">
                <img src="./images/food1.jpeg" />
              </div>
              <div class="flex" style="padding:8px 4px; width:232px">
                <div class="store-name">건대 소두마리</div>
                <div class="views">2.4K</div>
              </div>
              <div class="flex" style="padding-left: 4px;">
                <div class="keyword">
                  <div class="chile-flex-1;">강남구</div>
                </div>
                <div class="keyword">
                  <div class="chile-flex-1;">카페</div>
                </div>
              </div>
            </div> -->
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
<?php include_once('./footer.php') ?>