<?php $page = "main"; ?>

<?php include_once("./m.head.php"); ?>

  <div class="main">
    <div>
      <div class="owl-carousel owl-theme">
        <?php
          // for($i=0; $i <= 2; $i++){
            $url = "./m.news_detail.php";
        ?>
        <div class="item" data-id="<?=$i?>" onclick="click_main_banner(this,'<?php echo $url ?>')" >
          <img src="./images/whereit_img_main_02.png" >
        </div>
        <div class="item" data-id="<?=$i?>" onclick="click_main_banner(this,'<?php echo $url ?>')" >
          <img src="./images/whereit_img_main_005.png" >
        </div>
        <div class="item" data-id="<?=$i?>" onclick="click_main_banner(this,'<?php echo $url ?>')" >
          <img src="./images/whereit_img_main_006.png" >
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
      <form  class="search-form" method="POST" action="m.search.php">
        <div class="input-form">
          <input id="search-input" type="text" name="search" maxlength="50" placeholder="지역명과 음식을 입력해주세요."/>
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