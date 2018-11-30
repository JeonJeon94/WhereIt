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
    if($('.checkbox3 img').attr('src') != "./images/box-check.png"){
      return alert("약관에 동의하셔야 가입하실 수 있습니다.")
    }
    
    $("#next-btn2").css("display","none")
    api_send_mail($("#sign-mail").val(),$("#sign-pw").val(), $("#username").val(), function(res){
      console.log(res)
      // if(true){
      if(res.code == 1){
        $('.page-num2').css('display','none')
        $('.signup-end').css('display','block')
      }else{
        alert("가입 도중 문제가 발생했습니다. 다시 시도해주세요!")
        $("#next-btn2").css("display","block")
      }
    })
    
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
  $('#cancel').click(function(){
    $('.myinfo').css('display','block')
    $('.edit-info').css('display','none')
  });
  $('#logout').click(function(){
    $('.logout-box').css('display','block')
    $('.modal-container').css('display','block')
  });
</script>