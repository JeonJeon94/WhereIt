<script>
  var _hot_page_y = 0;
  var _hot_paging_enable = true;
  setInterval(function(){
    if(_hot_paging_enable == false)
      return;
    _hot_page_y++ ;
    
    if(_hot_page_y >= 10)
      _hot_page_y=0;
    $(".hot").css("transform","translateY(-"+_hot_page_y * 30+"px)");
  },3000)
  var slide_bt_click = false;
  $("#down-btn").on("click", function(){
    _hot_paging_enable = false;
    if(slide_bt_click === false){
      $(".hot").parent().css("overflow","visible")
      _hot_page_y = 0;
      $(".hot").css("transition","none")
      $(".hot").css("transform","translateY(-0px)");

      $("#down-btn").css("display", "none")
      $("#up-btn").css("display", "block")
      // $(".rank-container").css("align-items","normal")
      $(".hot-list-h").css("padding","10px 0px")
      $(".hot-list").slideDown('fast',function(){
        slide_bt_click = true;
      });
      $('.hot-text').css('display', 'block')
      $(".hot").css("border", "0.04em solid #E0EAE9")
      $(".hot").css("background", "white")
    }
  });
  $("#up-btn").on("click", function(){
    if(slide_bt_click === true){
      $("#down-btn").css("display", "block")
      $("#up-btn").css("display", "none")
      $(".hot-list").slideUp("fast",function(){
        $('.hot-text').css('display', 'none')
      })

      $(".hot").css("border", "none")
      $(".hot").css("background", "white")
      setTimeout(function(){
        _hot_paging_enable = true;
        slide_bt_click = false;
        $(".hot-list-h").css("padding","5px 0px 5px 0")
        $(".hot").css("transition","all 0.5s")
        $(".hot").parent().css("overflow","hidden")
        $(".hot-list").css("display","list-item")
        $(".hot-list-h").css("display","list-item")
      },300)
    }
  });
  $("#in-down_bt").on("click", function(){
    $("#in-down_bt").css("display", "none")
    $("#in-up_bt").css("display", "block")
    $(".insta-text").slideDown('fast');
    $(".insta-list").css("border", "0.04em solid #E0EAE9")
    $(".insta-list").css("background", "white")
  });
  $("#in-up_bt").on("click", function(){
    $("#in-down_bt").css("display", "block")
    $("#in-up_bt").css("display", "none")
    $(".insta-text").slideUp("fast")
    $(".insta-list").css("border", "none")
    $(".insta-list").css("background", "none")
  });
</script>