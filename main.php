 <!-- 
  test id    T2gAKVtQHVUdwkqP3sew
  test pw    bxz3Ih2wFu
-->

<?php $page = "main"; ?>

<?php include_once('./head.php'); ?>
  <div class="main">
    <div>
      <div class="owl-carousel owl-theme">
        <div class="item" style="width:1200px;">
          <img src="./images/foodimg3.jpeg">
        </div>
        <div class="item" style="width:1200px;">
          <img src="./images/foodimg2.jpeg">
        </div>
        <div class="item" style="width:1200px;">
          <img src="./images/foodimg1.jpeg">
        </div>
      </div>
    </div>
    <div class="search-form">
      <div class="where-top">
        <div class="where">
          <div style="color:#504f57;">
            <b>찾으시는 곳</b>이<br>
            있으신가요?
          </div>
        </div>
        <div class="where-form">  
          <form class="form" method="POST" action="search.php">
            <div class="search-word">
              <input type="text" id="search-word" name="search" placeholder="지역명과 음식을 입력해주세요. Ex)망원동 양꼬치" />
              <img id="search" src="./images/search.png" onclick="submit()"/>
            </div>
            <button id="search-btn">SEARCH</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include_once('./footer.php'); ?>