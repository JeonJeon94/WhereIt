<?php $page = "main" ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Where It</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/m.style.css?ver=1.1"  type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.5/bluebird.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://13.124.4.4/gen_api.js"></script>
</head>
<body class="default-page <?=$page?>-page">
  <div class="head">
    <div class="head-top">
      <div class="logo">
        <img src="./images/header/logo.png" />
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
              <div class="hot-list-h"><div class="num">1</div><a href="m.search.php?search=">강남</a></div>
              <div class="hot-list" style="display:none;"><div class="num">2</div><a href="m.search.php?search=">건대</a></div>
              <div class="hot-list" style="display:none;"><div class="num">3</div><a href="m.search.php?search=">동대문</a></div>
              <div class="hot-list" style="display:none;"><div class="num">4</div><a href="m.search.php?search=">마포</a></div>
              <div class="hot-list" style="display:none;"><div class="num">5</div><a href="m.search.php?search=">신림</a></div>
              <div class="hot-list" style="display:none;"><div class="num">6</div><a href="m.search.php?search=">강북</a></div>
              <div class="hot-list" style="display:none;"><div class="num">7</div><a href="m.search.php?search=">왕십리</a></div>
              <div class="hot-list" style="display:none;"><div class="num">8</div><a href="m.search.php?search=">잠실</a></div>
              <div class="hot-list" style="display:none;"><div class="num">9</div><a href="m.search.php?search=">이태원</a></div>
              <div class="hot-list" style="display:none;"><div class="num">10</div><a href="m.search.php?search=">홍대</a></div>
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
  <div class="main">
    <div class="slide-picture">
      <div class="slide"><img src="./images/foodimg3.jpeg" /></div>
      <div class="slide"><img src="./images/foodimg1.jpeg" /></div>
      <div class="slide"><img src="./images/foodimg2.jpeg" /></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer-top">
      인스타그램에서<br> <b>가장 핫한 곳</b>이 궁금해?
    </div>
    <div>
      <form  class="search-form" method="POST" action="m.search.php">
        <input type="text" name="search" placeholder="가고싶은 지역을 입력해주세요."/>
        <img id="search-img" src="./images/search.png" onclick="submit()" />
        <button>SEARCH</button>
      </form>
    </div>
  </div>
</body>

<script>
  $("#down-btn").on("click", function(){
    $("#down-btn").css("display", "none")
    $("#up-btn").css("display", "block")
    $(".hot-list").slideDown('fast');
    $(".hot").css("border", "0.04em solid #E0EAE9")
    $(".hot").css("background", "white")
  });
  $("#up-btn").on("click", function(){
    $("#down-btn").css("display", "block")
    $("#up-btn").css("display", "none")
    $(".hot-list").slideUp("fast")
    $(".hot").css("border", "none")
    $(".hot").css("background", "#f9f5f8")
  });
</script>

</html>