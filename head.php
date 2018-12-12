<?php
  include './dbconfig.php';

    
  if(!empty($_GET['search'])){
    $search = $_GET['search'];
  }else{
    $search = "";
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
      $member[user_name] = "$member[register]-$member[user_email]";
    }
  }
  if($NEED_LOGIN == true){
    if(!$member){
      alert_back("로그인을 해주세요!");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <meta property="og:type" content="website">
  <meta property="og:title" content="웨얼잇">
  <meta property="og:description" content="리얼 맛집 정보 웨얼잇!">
  <meta name="naver-site-verification" content="5a78e9f61a3e8046a961b19a6d877a5992cd3829"/>

  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="676011647989-pagptrujs79jsqrdrt5lkelukcvt4gbh.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <title>WHERE It? WHERE EAT!</title>
  <link rel="stylesheet" href="./css/style.css?ver=2"  type="text/css" />
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="./images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="./OwlCarousel2/dist/assets/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="./OwlCarousel2/dist/assets/owl.theme.default.min.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.5/bluebird.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.0.js" charset="utf-8"></script>
  <script src="./OwlCarousel2/docs/assets/vendors/jquery.min.js" type="text/javascript"></script>
  <script src="./OwlCarousel2/dist/owl.carousel.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
  <script src="http://13.124.4.4/gen_api.js"></script>
  <script src="/kakao_sdk.js"></script>
</head>
<body class="default-page <?=$page?>-page">
<div class="all">
  <div class="head">
    <div class="top">
      <div class="logo">
        <a href="./main.php"><img src="./images/header/logo.png"/></a>
      </div>
      <div class="logo-copy">
        FIND A UNIQUE PLACE
      </div>
      <div class="where-form2">  
        <form class="form" method="get" action="search.php">
          <div class="search-word">
            <input type="text" id="search-word2" name="search" value="<?php echo $search; ?>" />
            <img id="search2"src="./images/search.png" onclick="submit()"/> 
          </div>
        </form>
      </div>
      <div class="login">
        <?php if($member) { ?> 
          <a style="color:#D8A3D2; padding:2px 5px 0 0; font-weight:bold;" href="./myinfo.php"><?= $member[user_name]?> </a>님
        <?php }else{ ?>
          <a href="./login.php">로그인</a>
        <?php } ?>
      </div>
    </div>
    <div class="menu">
      <div style="background:linear-gradient( to bottom, #F1EDF0, #FAF6F9);">
        <div style="flex:1; display:flex; padding-left:20px;">
          <div class="rank">
            <a href="./rank.php">랭킹</a>
          </div>
          <div class="news">
            <a href="./news.php">매거진</a>
          </div>
        </div>
        <div class="hot-search">
          <div class="hot-word">
            인기검색어
          </div>
          <div class="rank-container" style="display:flex; width:193px; height:44px;">
          <div class="hot-rank">
            <div style="flex:1;overflow: hidden;">
              <div class="hot" style="transition:all 0.5s">
                <div class="hot-list-h"><div class="num">1</div><a href="search.php?search=강남">강남</a></div>
                <div class="hot-list"><div class="num">2</div><a href="search.php?search=서초">서초</a></div>
                <div class="hot-list"><div class="num">3</div><a href="search.php?search=구의">구의</a></div>
                <div class="hot-list"><div class="num">4</div><a href="search.php?search=건대">건대</a></div>
                <div class="hot-list"><div class="num">5</div><a href="search.php?search=목동">목동</a></div>
                <div class="hot-list"><div class="num">6</div><a href="search.php?search=잠실">잠실</a></div>
                <div class="hot-list"><div class="num">7</div><a href="search.php?search=신림">신림</a></div>
                <div class="hot-list"><div class="num">8</div><a href="search.php?search=강변">강변</a></div>
                <div class="hot-list"><div class="num">9</div><a href="search.php?search=역삼">역삼</a></div>
                <div class="hot-list"><div class="num">10</div><a href="search.php?search=논현">논현</a></div>
              </div>
            </div>
          </div>
          <div class="rank_btn">
            <img style="display:block; padding: 5px;" id="down_bt" src="./images/rank_down.png" />
            <img style="display:none; padding: 5px;" id="up_bt" src="./images/rank_up.png" />
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>  