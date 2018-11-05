<script> 
  $("#down_bt").mouseover(function(){
    $(".hot-list").slideDown('fast');
    $("#down_bt").css("display",'none');
    $("#up_bt").css("display",'block');
    $('.hot').css("background","white");
    $('.hot').css("border",'0.04em solid #d8a3d2');
    
    $('.hot').hover(function(){
    },function(){
      $(".hot-list").slideUp('fast');
      $('#down_bt').css('display', 'block');
      $('#up_bt').css('display','none');
      $('.hot').css("background","linear-gradient( to bottom, #F1EDF0, #FAF6F9 )");
      $('.hot').css("border",'none');
    });
  });
</script>