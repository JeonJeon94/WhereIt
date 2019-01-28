<?php $page = "main"; ?>

<?php include_once("./m.head.php"); ?>
<?php
  $result = sql_select('SELECT * FROM banner_file_m ')
  ?>
  <div class="main">
    <div class="footer">
      <div class="footer-top">
        인스타그램에서<br> <b>가장 핫한 곳</b>이 궁금해?
      </div>
      <div>
        <div class="search-form">
          <div class="input-form">
            <div id="address-select">
            <?php 
            if($address != ""){
              echo $address;
            }else{
              echo "지역 선택";
            } 
            ?>
            </div>
            <div id="food-select">
            <?php
              if($food != ""){
                echo $food;
              }else{
                echo "음식 선택";
              }
            ?>
            </div>
          </div>
          <div id="s_btn" onclick="s_get()">SEARCH</div>
        </div>
      </div>
    </div>
    <div>
      <div class="owl-carousel owl-theme">
        <?php
          foreach($result as $rows){
        ?>
        <div class="item" style="margin:0 0.3em;" data-id="<?php echo $rows[id]; ?>" onclick="click_main_banner(this,'<?php echo $rows[url]; ?>')">
          <img src='<?php echo $rows[banner_file]; ?>'>
        </div>
        <?php }?>
      </div>
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
      if(center == 1 && clicked == max){
        return $(".owl-prev").click()
      }
      if(center == max && clicked == 1){
        return $(".owl-next").click()
      }
      if(center > clicked){
        $(".owl-prev").click()
      }else{
        $(".owl-next").click()
      }
    }
  }

</script>

<script>

  $(window).bind("pageshow", function(event) {
      if (event.originalEvent.persisted) {
          document.location.reload();
      }
  });

  window.onpageshow = function(event) {
      if (event.persisted) {
          document.location.reload();
      }
  };
  
</script>

<?php include_once("./m.footer.php"); ?>