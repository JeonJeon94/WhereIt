<?php
if(isset($_POST['search'])){
  true;
}else{
  $_POST['search']="";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content='width=device-width , initial-scale=1'>
  <title>Where It</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css?ver=1.1" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.0.js" charset="utf-8"></script>
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
        <form class="form" method="post">
          <div class="search-word">
            <input type="text" id="search-word2" name="search" value="<?php echo $_POST['search']; ?>" />
            <img id="search2" src="./images/search.png" onclick="location.href='search.php'"/>
          </div>
        </form>
      </div>
      <div class="login">
        <a href="./login.php">로그인</a>
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
          <div class="hot-rank">
            <div style="flex:0 1 auto;">
              <div class="hot">
                <div class="hot-list-h"><div class="num">1</div><a href="#">강남 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">2</div><a href="#">서초 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">3</div><a href="#">구의 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">4</div><a href="#">건대 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">5</div><a href="#">목동 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">6</div><a href="#">잠실 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">7</div><a href="#">신림 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">8</div><a href="#">강변 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">9</div><a href="#">역삼 맛집 찾기</a></div>
                <div class="hot-list" style="display:none;"><div class="num">10</div><a href="#">논현 맛집 찾기</a></div>
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