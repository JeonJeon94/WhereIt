<script>
  $("#search-btn").click(function(){
    $(".main").css("display","none")
    $(".modal-container").css("display","block")
  })
  $('#mail-send').click(function(){

    api_forget_password($('#post-mail').val(), function(res){
      if(res.code == 1){
        $(".find-center").css("display","none")
        $('.notice').css('display','block')
      }else{
        alert("이메일이 올바르지 않습니다!")
      }
    })
  });
  $('#edit').click(function(){
    $('.edit-info').css('display','block')
    $('.myinfo').css('display','none')
  });
  $('#cancel').click(function(){
    $('.myinfo').css('display','block')
    $('.edit-info').css('display','none')
  });
  $('#logout').click(function(){
    $('.logout-box').css('display','block')
    $('.modal-container').css('display','block')
  });
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
    if($('.checkbox3 img').attr('src') != "./images/box-check.png"){
      return alert("약관에 동의하셔야 가입하실 수 있습니다.")
    }
    api_send_mail($("#sign-mail").val(),$("#sign-pw").val(), $("#username").val(), function(res){
      if(res.code == 1){
        $('.page-num2').css('display','none')
        $('.signup-end').css('display','block')
      }else{
        alert("가입 도중 문제가 발생했습니다. 다시 시도해주세요!")
      }
    })
  });
  
</script>