<script>
  $('#send').click(function(){
    $('#notice').css('display','block')
  });
  $('#mail-send').click(function(){
    $('.notice').css('display','block')
  });
  $('#next-btn1').click(function(){
    $('.page-num1').css('display','none')
    $('.page-num2').css('display','block')
  });
  $('#accept').click(function(){
    $('.accept-contents').css('display','block')
  });
  $('#confirm-btn').click(function(){
    $('.accept-contents').css('display','none')
  });
  $('#next-btn2').click(function(){
    $('.page-num2').css('display','none')
    $('.page-num3').css('display','block')
  });
  $('#send-btn').click(function(){
    $('.page-num3').css('display','none')
    $('.signup-end').css('display','block')
    $('.page-num1').css('display','none')
  });
</script>