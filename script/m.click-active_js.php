<script>
  $("#search-btn").click(function(){
    $(".main").css("display","none")
    $(".modal-container").css("display","block")
  })
  $('#mail-send').click(function(){
    $(".find-center").css("display","none")
    $('.notice').css('display','block')
  });
  $('#new-btn').click(function(){
    $('.notice').css('display','block')
    $('.edit-center').css('display','none')
  });
  $('#edit').click(function(){
    $('.edit-info').css('display','block')
    $('.myinfo').css('display','none')
  });
  // $('#save').click(function(){
  //   $('.myinfo').css('display','block')
  //   $('.edit-info').css('display','none')
  // });
  $('#cancel').click(function(){
    $('.myinfo').css('display','block')
    $('.edit-info').css('display','none')
  });
  // $('#logout').click(function(){
  //   $('.logout-box').css('display','block')
  //   $('.modal-container').css('display','block')
  // });
  $('#next-btn1').click(function(){
    $('.page-num1').css('display','none')
    $('.page-num2').css('display','block')
  });
  $('#accept').click(function(){
    $('.page-num2').css('display','none')
    $('.accept-contents').css('display','block')
  });
  $('#confirm-btn').click(function(){
    $('.accept-contents').css('display','none')
    $('.page-num2').css('display','block')
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