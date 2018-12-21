<?php $page = "main"; ?>

<?php include_once("./m.head.php"); ?>

  <div class="main">
    <div>
      <div class="owl-carousel owl-theme">
        <?php
          // for($i=1; $i <= 2; $i++){
          //   $url = "./m.news_detail.php?data-id=$i";
          //   $banner = "./images/main_banner/whereit_img_m.main_00$i.png"
        ?>
        <div class="item">
          <img src='./images/main_banner/whereit_img_main_02.png'>
        </div>
        <div class="item" onclick="click_main_banner(this,'./rank.php?tag=와인')">
          <img src='./images/main_banner/whereit_img_main_008.png'>
        </div>
        <div class="item" data-id="1" onclick="click_main_banner(this,'./news_detail.php?data-id=1')">
          <img src='./images/main_banner/whereit_img_m.main_001.png' >
        </div>
        <div class="item" data-id="2" onclick="click_main_banner(this,'./news_detail.php?data-id=2')" >
          <img src='./images/main_banner/whereit_img_m.main_002.png' >
        </div>
        <?php //} ?>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer-top">
      인스타그램에서<br> <b>가장 핫한 곳</b>이 궁금해?
    </div>
    <div>
      <form  class="search-form" method="GET" action="m.search.php">
        <div class="input-form">
          <input id="search-input" type="text" name="search" maxlength="50" placeholder="<?=$b_text[search_b]?>"/>
          <img id="search-img" src="./images/search.png" onclick="submit()" />
        </div>
        <button>SEARCH</button>
      </form>
    </div>
  </div>
  <script>
    function click_main_banner(element,url){
      var clicked = $(element).attr("data-id");
      var max = 0
      $(".item").each(function(){ max = $(this).attr("data-id") > max ? $(this).attr("data-id") : max })

      if($(element).parent().hasClass("center")){
        location.href=url;
      }else{
        var center = $(".center .item").attr("data-id")
        console.log(center, max, clicked)
        if(center == 0){
          if(clicked == max){
            return $(".owl-prev").click()
          }
        }
        if(center == max){
          if(clicked == 0){
            return $(".owl-next").click()
          }
        }
        if(center > clicked){
          $(".owl-prev").click()
        }else{
          $(".owl-next").click()
        }
      }
    }
  </script>

<?php include_once("./m.footer.php"); ?>