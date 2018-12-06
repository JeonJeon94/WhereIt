<?php $page = "main"; ?>

<?php include_once("./m.head.php"); ?>

  <div class="main">
    <div>
      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="./images/m_foodimg3.jpg">
        </div>
        <div class="item">
          <img src="./images/m_foodimg2.jpg">
        </div>
        <div class="item">
          <img src="./images/m_foodimg1.jpg">
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer-top">
      인스타그램에서<br> <b>가장 핫한 곳</b>이 궁금해?
    </div>
    <div>
      <form  class="search-form" method="POST" action="m.search.php">
        <div class="input-form">
          <input type="text" name="search" maxlength="50" placeholder="가고싶은 지역을 입력해주세요."/>
          <img id="search-img" src="./images/search.png" onclick="submit()" />
        </div>
        <button>SEARCH</button>
      </form>
    </div>
  </div>

<?php include_once("./m.footer.php"); ?>