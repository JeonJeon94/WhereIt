<?php 
  if(!empty($_POST['search'])){
    $search = $_POST['search'];
  }else{
    $search = "";
    if(!empty($_GET['search'])){
      $search = $_GET['search'];
    }else{
      $search = "";
    }
  }
  if(!empty($_GET['id'])){
    $id=$_GET['id'];
  }else{
    $id="";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Where It</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/m.style.css?ver=1.1"  type="text/css" />
  <link rel="stylesheet" href="./OwlCarousel2/dist/assets/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="./OwlCarousel2/dist/assets/owl.theme.default.min.css" type="text/css">
  <script src="./OwlCarousel2/docs/assets/vendors/jquery.min.js" type="text/javascript"></script>
  <script src="./OwlCarousel2/dist/owl.carousel.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.5/bluebird.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
  <script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.0.js" charset="utf-8"></script>
  <script src="http://13.124.4.4/gen_api.js"></script>
</head>
<body class="default-page <?=$page?>-page">
  <div class="slide-modal">
    <div class="menu-slide">
      <div id="close-icon">
        <img src="./images/etc/close.png" />
      </div>
      <div id="login-icon">
        <img src="./images/default/login.png" onclick="location.href='m.login.php'"/>
        <div>로그인</div>
        <img style="display:none;" src="./images/default/mypage.png" onclick="location.href='m.mypage.php'"/>
        <div style="display:none;">마이페이지</div>
      </div>
      <div id="ranking-icon">
        <img src="./images/default/rank.png" onclick="location.href='m.rank.php'"/>
        <div>랭킹</div>
      </div>
      <div id="news-icon">
        <img src="./images/default/news.png" onclick="location.href='m.news.php'"/>
        <div>매거진</div>
      </div>
      <div id="rank-area-icon">
        <img src="./images/default/area.png" />
        <div>검색가능 지역</div>
      </div>
      <div class="tooltip-content">
        <p style="font-size:36px; margin:0 0 30px 0;"><b>검색 가능</b>한 지역</p>
        <p style="font-size:18px;">#강남 #삼청동 #샤로수길 #양재 #북촌 #익선동 #역삼 #홍대 #이태원 #신사동 #청담</p>
      </div>
      <div id="favorite-icon">
        <img src="./images/default/favorite.png" onclick="location.href='m.favorite.php'"/>
        <div>즐겨찾기</div>
      </div>
      <div id="contents-icon">
        <img src="./images/default/contents.png" onclick="location.href='m.contents.php'"/>
        <div>이용약관</div>
      </div>
      <div id="service-icon">
        <img src="./images/default/service.png"/>
        <div>서비스정보</div>
      </div>
      <div id="ask-icon">
        <img src="./images/default/ask.png" onclick="location.href='m.ask.php'"/>
        <div>문의하기</div>
      </div>
    </div>
  </div>
  <div class="head">
    <div class="head-top">
      <div class="search-icon">
        <img src="./images/etc/search.png" />
      </div>
      <div class="logo">
        <img src="./images/header/logo.png" onclick="location.href='m.index.php'"/>
      </div>
      <div class="form-container">
        <div class="back" onclick="location.href='m.index.php'" >
          <img src="./images/ect/close.png" />
        </div>
        <form  class="search-form2" method="POST" action="m.search.php">
          <input type="text" name="search" value="<?php echo $search; ?>" />
          <img id="search-img2" src="./images/search.png" onclick="submit()" />
        </form>
      </div>
      <div class="menu">
        <div class="menu-bar">
          <div class="slide-bar"></div>
          <div class="slide-bar"></div>
          <div class="slide-bar"></div>
        </div>
      </div>
    </div>
    <div class="head-hot">
      <div class="rank-container">
        <div class="hot-ranking">
          <div style="flex:1;"> 
            <div class="hot">
              <div class="hot-text" style="display:none; height:28px; margin:11px 0;">인기검색어</div>
              <div class="hot-list-h"><div class="num">1</div><a href="m.search.php?search=강남">강남</a></div>
              <div class="hot-list" style="display:none;"><div class="num">2</div><a href="m.search.php?search=건대">건대</a></div>
              <div class="hot-list" style="display:none;"><div class="num">3</div><a href="m.search.php?search=동대문">동대문</a></div>
              <div class="hot-list" style="display:none;"><div class="num">4</div><a href="m.search.php?search=마포">마포</a></div>
              <div class="hot-list" style="display:none;"><div class="num">5</div><a href="m.search.php?search=신림">신림</a></div>
              <div class="hot-list" style="display:none;"><div class="num">6</div><a href="m.search.php?search=강북">강북</a></div>
              <div class="hot-list" style="display:none;"><div class="num">7</div><a href="m.search.php?search=왕십리">왕십리</a></div>
              <div class="hot-list" style="display:none;"><div class="num">8</div><a href="m.search.php?search=잠실">잠실</a></div>
              <div class="hot-list" style="display:none;"><div class="num">9</div><a href="m.search.php?search=이태원">이태원</a></div>
              <div class="hot-list" style="display:none;"><div class="num">10</div><a href="m.search.php?search=홍대">홍대</a></div>
            </div>
          </div>
        </div>
        <div class="rank-btn">
          <img id="down-btn" src="./images/rank_down.png" />
          <img id="up-btn" src="./images/rank_up.png" />
        </div>
      </div>
    </div>
  </div>