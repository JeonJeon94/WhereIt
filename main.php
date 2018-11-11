 <!-- 
  test id    T2gAKVtQHVUdwkqP3sew
  test pw    bxz3Ih2wFu
-->

<?php $page = "main"; ?>
<?php include_once('./head.php'); ?>
  <div class="main">
    <div id="slider">
      <ul class="slides">
        <li class="slide slide3"><img src="./images/foodimg3.jpeg" /></li>
        <li class="slide slide1"><img src="./images/foodimg1.jpeg" /></li>
        <li class="slide slide2"><img src="./images/foodimg2.jpeg" /></li>
        <li class="slide slide3"><img src="./images/foodimg3.jpeg" /></li>
        <li class="slide slide1"><img src="./images/foodimg1.jpeg" /></li>
      </ul>
      <div class="slider-nav-btn">
        <div id="slider-nav-prv">
          &#10094;
        </div>
        <div id="slider-nav-nxt">
          &#10095;
        </div>
      </div>
      <div id="slider-nav">
        <!-- <div id="slider-nav-prv">
          
        </div>
        <div id="slider-nav-nxt">
          &#10095;
        </div> -->
        <div id="slider-nav-dot-con">
          <span class="slider-nav-dot" style="background:white" id="nav-dot1"></span>
          <span class="slider-nav-dot" id="nav-dot2"></span>
          <span class="slider-nav-dot" id="nav-dot3"></span>
        </div>
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


<!-- <div class="test">
      <div class="test-box">
        <div class="test-picture">
          <img src="./images/foodimg1.jpeg" />  
        </div>
        <div class="test-picture">
          <img src="./images/foodimg1.jpeg" />  
        </div>
        <div class="test-picture">
          <img src="./images/foodimg1.jpeg" />  
        </div>
      </div>
    </div> -->
    <!-- <div class="picture-slide">
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
    </div> -->