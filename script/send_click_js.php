<script>
  $('#send').click(function(){
    $('#notice').css('display','block')
    $('.modal-container').css('display','block')
  });
  $('#mail-send').click(function(){
    $('.notice').css('display','block')
    $('.modal-container').css('display','block')
  });
  $('#next-btn1').click(function(){
    $('.page-num1').css('display','none')
    $('.page-num2').css('display','block')
  });
  $('#accept').click(function(){
    $('.modal-container').css('display','block')
    $('.accept-contents').css('display','block')
  });
  $('#confirm-btn').click(function(){
    $('.accept-contents').css('display','none')
    $('.modal-container').css('display','none')
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
  $('#new-btn').click(function(){
    $('.notice').css('display','block')
    $('.modal-container').css('display','block')
  });
  $('#edit').click(function(){
    $('.myinfo').css('display','none')
    $('.edit-info').css('display','block')
  });
  $('#save').click(function(){
    $('.myinfo').css('display','block')
    $('.edit-info').css('display','none')
  });
  $('#cancel').click(function(){
    $('.myinfo').css('display','block')
    $('.edit-info').css('display','none')
  });
  $('#logout').click(function(){
    $('.logout-box').css('display','block')
    $('.modal-container').css('display','block')
  });
</script>