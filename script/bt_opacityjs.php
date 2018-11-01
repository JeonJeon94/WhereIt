<script> 
  $(".left").hover(function(){
    $("#prev_bt").css('opacity','0.8');
  },
  function(){
    $("#prev_bt").css('opacity', '0.7');
  });
  $(".right").hover(function(){
    $("#next_bt").css('opacity','0.8');
  },
  function(){
    $("#next_bt").css('opacity', '0.7');
  });
  $(".left").on("click",function(){
    $("#prev_bt").css('opacity','1');
    setTimeout(() => {
      $("#prev_bt").css('opacity', '0.8');        
    }, 100);
  });
  $(".right").on("click",function(){
    $("#next_bt").css('opacity','1');
    setTimeout(() => {
      $("#next_bt").css('opacity', '0.8');
    }, 100);
  });
</script>