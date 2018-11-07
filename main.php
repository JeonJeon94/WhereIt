<?php $page = "main"; ?>
<?php include_once('./head.php'); ?>
  <div class="main">
    <div class="picture-slide">
      <div class="picture">
        <div class="slides"><img src='./images/foodimg1.jpeg' /></div>
        <div class="slides"><img src='./images/foodimg2.jpeg' /></div>
        <div class="slides"><img src='./images/foodimg3.jpeg' /></div>
      </div>
      <div class="btn">
        <div>
          <a class="arrow left">
            <img id="prev_bt" src='./images/nav_bt.png'/>
            <img id="prev_arrow" src='./images/nav_arrow_left.png'/>
          </a>
        </div>
        <div>
          <a class="arrow right">
            <img id="next_bt" src='./images/nav_bt.png'/>
            <img id="next_arrow" src='./images/nav_arrow_right.png'/>
          </a>
        </div>  
      </div>
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
    </div>
    <div class="search-form">
      <div class="where-top">
        <div class="where">
          <div>
            <b>찾으시는 곳</b>이<br>
            있으신가요?
          </div>
        </div>
        <div class="where-form">  
          <form class="form" method="POST" action="search.php">
            <div class="search-word">
              <input type="text" id="search-word" name="search" placeholder="지역명과 음식을 입력해주세요. Ex)망원동 양꼬치" />
              <img id="search" src="./images/search.png" />
            </div>
            <button id="search-btn">SEARCH</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include_once('./footer.php'); ?>