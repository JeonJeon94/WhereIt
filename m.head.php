<?php 
  include './dbconfig.php';
  
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
  
  if($_SESSION['user_id']){
    $user_id = $_SESSION['user_id'];
    $member = sql_one("SELECT * FROM users WHERE id=$user_id");
    if(!$member[user_name]){
      $member[user_name] = "naverlogin";
    }
  }
  if($NEED_LOGIN == true){
    if(!$member){
      alert_back("로그인을 해주세요!");
    }
  }
  $rank_src = './images/default/rank.png';
  $news_src = './images/default/news.png';
  $favorite_src = './images/default/favorite.png';
  $contents_src = './images/default/contents.png';
  $service_src = './images/default/service.png';
  $ask_src = './images/default/ask.png';
  
  $rank_adress='m.rank.php';
  $news_adress='m.news.php';
  $favorite_adress='m.favorite.php';
  $contents_adress='m.contents.php';
  $service_adress='m.service-info.php';
  $ask_adress='m.ask.php';

  switch($page){
    case 'ranking-theme' : 
      $rank_src = './images/select/rank-active.png';
      break;
    case 'ranking-thismonth' : 
      $rank_src = './images/select/rank-active.png';
      break;
    case 'ranking-nowdays' : 
      $rank_src = './images/select/rank-active.png';
      break;
    case 'news' :
      $news_src = './images/select/news-active.png';
      break;
    case 'favorite' :
      $favorite_src = './images/select/favorite-active.png';
      break;
    case 'service' :
      $service_src = './images/select/service-active.png';
      break;
    case 'ask' :
      $ask_src = './images/select/ask-active.png';
      break;

    default :
      break;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Where It</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="./css/m.style.css?ver=1.1"  type="text/css" />
  <link rel="stylesheet" href="./OwlCarousel3/dist/assets/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="./OwlCarousel3/dist/assets/owl.theme.default.min.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
  <script src="./OwlCarousel3/docs/assets/vendors/jquery.min.js" type="text/javascript"></script>
  <script src="./OwlCarousel3/dist/owl.carousel.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.0.js" charset="utf-8"></script>
  <script src="http://13.124.4.4/gen_api.js"></script>
</head>
<body class="default-page <?=$page?>-page">
  <div class="slide-modal">
    <div class="tooltip-content">
      <div id="content-title"><b>검색 가능</b>한 지역</div>
      <div id="content-text">#강남 #삼청동 #샤로수길 #양재 #북촌 #익선동 #역삼 #홍대 #이태원 #신사동 #청담</div>
    </div>
    <div class="menu-slide">
      <div id="close-icon">
        <img src="./images/etc/close.png" />
      </div>
      <div id="login-icon">
      <?php if(!$member){?>
        <img src='./images/default/login.png' onclick="location.href='m.login.php'"/>
        <div>로그인</div>
      <?php }else if($member){?>
        <img src='./images/default/mypage.png' onclick="location.href='m.mypage.php'"/>
        <div>마이페이지</div>
      <?php } ?>
      </div>
      <div id="ranking-icon">
        <img src="<?= $rank_src; ?>" onclick="location.href='<?= $rank_adress; ?>'"/>
        <div>랭킹</div>
      </div>
      <div id="news-icon">
        <img src="<?= $news_src; ?>" onclick="location.href='<?= $news_adress; ?>'"/>
        <div>매거진</div>
      </div>
      <div id="rank-area-icon">
        <img src="./images/default/area.png" />
        <div>검색가능<br/>지역</div>
      </div>
      <div id="favorite-icon">
        <img src="<?= $favorite_src; ?>" onclick="location.href='<?= $favorite_adress; ?>'"/>
        <div>즐겨찾기</div>
      </div>
      <div class="slide-line"></div>
      <div id="contents-icon">
        <img src="<?= $contents_src; ?>" onclick="location.href='<?= $contents_adress; ?>'"/>
        <div>이용약관</div>
      </div>
      <div id="service-icon">
        <img src="<?= $service_src; ?>" onclick="location.href='<?= $service_adress; ?>'"/>
        <div>서비스정보</div>
      </div>
      <div id="ask-icon">
        <img src="<?= $ask_src; ?>" onclick="location.href='<?= $ask_adress; ?>'"/>
        <div>문의하기</div>
      </div>
    </div>
  </div>
  <div class="head">
    <div class="head-top">
    <?php if($page == 'search'){ ?>
      <div class="search-icon" style="display:none !important;">
    <?php }else{ ?>
      <div class="search-icon">
    <?php } ?>
        <img src="./images/etc/search.png" />
      </div>
      <div class="logo">
        <img src="./images/header/logo.png" onclick="location.href='main.php'"/>
      </div>
      <div class="form-container">
      <?php if($page=='search'){ ?>
        <div class="back" onclick="location.href='./m.index.php'">
      <?php }else{ ?>
        <div class="back">
      <?php } ?>
          <img src="./images/etc/close.png" />
        </div>
        <form  class="search-form2" method="POST" action="m.search.php">
          <div class="input-container">
            <input id="search2-input" maxlength="50" type="text" name="search" value="<?php echo $search; ?>" />
            <img id="search-img2" src="./images/search.png" onclick="submit()" />
          </div>
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
          <div style="flex:1; overflow:hidden">
            <ul class="hot" style="transition:all 0.5s">
              <li class="hot-text" style="display:none; padding: 5px 0px; color: #504f57;">인기검색어</li>
              <li class="hot-list-h"><div class="num">1</div><a href="m.search.php?search=강남">강남</a></li>
              <li class="hot-list"><div class="num">2</div><a href="m.search.php?search=건대">건대</a></li>
              <li class="hot-list"><div class="num">3</div><a href="m.search.php?search=동대문">동대문</a></li>
              <li class="hot-list"><div class="num">4</div><a href="m.search.php?search=마포">마포</a></li>
              <li class="hot-list"><div class="num">5</div><a href="m.search.php?search=신림">신림</a></li>
              <li class="hot-list"><div class="num">6</div><a href="m.search.php?search=강북">강북</a></li>
              <li class="hot-list"><div class="num">7</div><a href="m.search.php?search=왕십리">왕십리</a></li>
              <li class="hot-list"><div class="num">8</div><a href="m.search.php?search=잠실">잠실</a></li>
              <li class="hot-list"><div class="num">9</div><a href="m.search.php?search=이태원">이태원</a></li>
              <li class="hot-list"><div class="num">10</div><a href="m.search.php?search=홍대">홍대</a></li>
            </ul>
          </div>
          <div class="rank-btn">
            <img id="down-btn" src="./images/rank_down.png" />
            <img id="up-btn" src="./images/rank_up.png" />
          </div>
        </div>
      </div>
    </div>
  </div>
