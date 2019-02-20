<?php
  include './dbconfig.php';

    
  if(!empty($_GET['address'])){
    $address = $_GET['address'];
  }else{
    $address = ""; 
  }
  if(!empty($_GET['food'])){
    $food = $_GET['food'];
  }else{
    $food = "";
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

  //검색창 리스트
  $a_list = sql_select("SELECT * FROM address_list");
  $f_list = sql_select("SELECT * FROM food_list");

  //검색창 문구
  $h_text= sql_one("SELECT search_h FROM banner_text WHERE id = 1");
  $b_text= sql_one("SELECT search_b FROM banner_text WHERE id = 2");
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="리얼 맛집 정보 웨얼잇!">
  <meta property="og:type" content="website">
  <meta property="og:title" content="웨얼잇">
  <meta property="og:description" content="리얼 맛집 정보 웨얼잇!">
  <meta property="og:image" content="./images/whereit_img_og_001.png"/>
  <meta name="naver-site-verification" content="5a78e9f61a3e8046a961b19a6d877a5992cd3829"/>

  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="676011647989-pagptrujs79jsqrdrt5lkelukcvt4gbh.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <title>WHERE It? WHERE EAT!</title>
  <link rel="stylesheet" href="./css/style.css?ver=2.3"  type="text/css" />
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
  <script src="http://52.79.100.193/gen_api.js"></script>
  <script src="/kakao_sdk.js"></script>
  <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-8731291940203445",
      enable_page_level_ads: true
    });
  </script>
</head>
<body class="default-page <?=$page?>-page">
<?php include_once("analyticstracking.php") ?>
<div class="all">
  <div class="head">
    <div class="top">
      <div class="logo">
        <a href="./main.php"><img src="./images/header/whereit_img_logo_01.png"/></a>
      </div>
      <div class="logo-copy">
        FIND A UNIQUE PLACE
      </div>
      <div class="where-form2">
        <div style="display:flex;">
          <div class="input-form">
            <div style="position:relative">
              <div id="address-select2">
                <?php
                  if($address != ""){
                    if($page=="search"){
                      echo "지역 선택";
                    }else{
                      echo $address;
                    }
                  }else{
                    echo "지역 선택";
                  } 
                ?>
              </div>
              <div class="address">
                <div id="address_text">지역 선택</div>
                <?php foreach($a_list as $row){ ?>
                <div class="address_text"><?=$row[address]?></div>
                <?php } ?>
              </div>
            </div>
            <div style="position:relative">
              <div id="food-select2">
                <?php
                  if($food != ""){
                    if($page=="search"){
                      echo "음식 선택";
                    }else{
                      echo $food;
                    }
                  }else{
                    echo "음식 선택";
                  } 
                  ?>
              </div>
              <div class="food">
                <div id="food_text">음식 선택</div>
                <?php foreach($f_list as $row){ ?>
                <div class="food_text"><?=$row[food]?></div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div id="s_btn" onclick="s_get()">SEARCH</div>
        </div>
      </div>
      <div class="login">
        <?php if($member) { ?> 
          <a style="color:#FF5566; padding:2px 5px 0 0; font-weight:bold;" href="./myinfo.php"><?= $member[user_name]?> </a>님
        <?php }else{ ?>
          <a href="./login.php">로그인</a>
        <?php } ?>
      </div>
    </div>
    <div class="menu">
      <div>
        <div style="flex:1; display:flex; padding-left:20px;">
          <div class="rank">
            <a href="./rank-thismonth.php">랭킹</a>
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
                <div class="hot-list-h"><div class="num">1</div><a href="search.php?address=강남">강남</a></div>
                <div class="hot-list"><div class="num">2</div><a href="search.php?address=홍대">홍대</a></div>
                <div class="hot-list"><div class="num">3</div><a href="search.php?address=이태원">이태원</a></div>
                <div class="hot-list"><div class="num">4</div><a href="search.php?address=익선동">익선동</a></div>
                <div class="hot-list"><div class="num">5</div><a href="search.php?address=합정">합정</a></div>
                <div class="hot-list"><div class="num">6</div><a href="search.php?address=압구정">압구정</a></div>
                <div class="hot-list"><div class="num">7</div><a href="search.php?address=가로수길">가로수길</a></div>
                <div class="hot-list"><div class="num">8</div><a href="search.php?address=샤로수길">샤로수길</a></div>
                <div class="hot-list"><div class="num">9</div><a href="search.php?address=경리단길">경리단길</a></div>
                <div class="hot-list"><div class="num">10</div><a href="search.php?address=북촌">북촌</a></div>
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