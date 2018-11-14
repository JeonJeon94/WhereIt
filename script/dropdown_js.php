<script>
  $("#down_bt").on("mouseover", function(){
    $(".hot-list").slideDown('fast');
    $("#down_bt").css("display",'none');
    $("#up_bt").css("display",'block');
    $('.hot').css("background","white");
    $('.hot').css("border",'0.04em solid #d8a3d2');
  });

  $(".rank-container").on("mouseleave",function(){
    $(".hot-list").slideUp('fast');
    $('#down_bt').css('display', 'block');
    $('#up_bt').css('display','none');
    $('.hot').css("background","linear-gradient( to bottom, #F1EDF0, #FAF6F9 )");
    $('.hot').css("border",'none');
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