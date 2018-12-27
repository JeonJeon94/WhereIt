<script>
  var _hot_y = 0
  var _hot_mouse_over = false;
  setInterval(function(){
    if(_hot_mouse_over)
      return ;

    _hot_y++;
    if(_hot_y >= 10)
      _hot_y = 0;
    $(".hot").css("transform","translateY(-"+_hot_y*34+"px)")
  },3000)
  
  $("#down_bt").on("mouseover", function(){
    _hot_y =0;
    _hot_mouse_over = true;
    $(".hot").css("transition","none");
    $(".hot").parent().css("overflow","visible")
    $(".hot").css("transform","translateY(0px)")
    $(".hot-list").slideDown('fast');
    $("#down_bt").css("display",'none');
    $("#up_bt").css("display",'block');
    $('.hot').css("background","white");
    $('.hot').css("border",'0.04em solid #d8a3d2');
  });

  $(".rank-container").on("mouseleave",function(){
    _hot_y =0;
    $(".hot").css("transform","translateY(0px)")

    $(".hot-list").slideUp('fast');
    $('#down_bt').css('display', 'block');
    $('#up_bt').css('display','none');
    setTimeout(function(){
      $('.hot').css("background","none");
    },100);
    $('.hot').css("opacity",'1');
    $('.hot').css("border",'none');

    setTimeout(function(){
      _hot_mouse_over = false;
      $(".hot").css("transition","all 0.5s");
      $(".hot").parent().css("overflow","hidden")
      $(".hot-list").css("display","flex")
    },500)
  });

  $("#in-down_bt").on("mouseover", function(){
    $(".insta-text").slideDown('fast');
    $("#in-down_bt").css("display",'none');
    $("#in-up_bt").css("display",'block');
    $('.insta-list').css("background-color","white");
    $('.insta-list').css("border",'2px solid #EAF1F0');
  });

  $(".insta-container").on("mouseleave",function(){
    $(".insta-text").slideUp('fast');
    $('#in-down_bt').css('display', 'block');
    $('#in-up_bt').css('display','none');
    $('.insta-list').css("background-color","none");
    $('.insta-list').css("border",'none');
  });
</script>