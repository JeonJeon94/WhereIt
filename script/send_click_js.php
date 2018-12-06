<script>
  $('#send').click(function(){
    $('#notice').css('display','block')
    $('.modal-container').css('display','block')
  });
  $('#mail-send').click(function(){
    api_forget_password($('#post-mail').val(), function(res){
      if(res.code == 1){
        $('.notice').css('display','block')
        $('.modal-container').css('display','block')
      }else{
        alert("이메일이 올바르지 않습니다!")
      }
    })
  });
  $('#sign-mail').keydown(function(key){
    if(key.keyCode == 13){
      $('#sign-pw').focus();
    }
  });
  $('#sign-pw').keydown(function(key){
    if(key.keyCode == 13){
      $('#next-btn1').click();
    }
  });
  $('#next-btn1').click(function(){
    var email = $('#sign-mail').val()
    var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

    if(exptext.test(email)==false){
      return alert("이메일 형식이 올바르지 않습니다.")
    }else{
      if($("#sign-pw").val().length < 8){
        return alert("비밀번호는 8자 이상 입력해주세요.")
      }else{
        $('.page-num1').css('display','none')
        $('.page-num2').css('display','block')
      }
    }
  });
  $('#accept').click(function(){
    $('.modal-container').css('display','block')
    $('.accept-contents').css('display','block')
  });
  $('#confirm-btn').click(function(){
    $('.accept-contents').css('display','none')
    $('.modal-container').css('display','none')
  });

  $('#username').keydown(function(key){
    if(key.keyCode == 13){
      $('#next-btn2').click();
    }
  });
  $('#next-btn2').click(function(){
    if($('.checkbox3 img').attr('src') != "./images/box-check.png"){
      return alert("약관에 동의하셔야 가입하실 수 있습니다.")
    }
    if($("#username").val().length < 4 || $("#username").val().length > 16 ){
      return alert("닉네임은 4~16자 사이로 입력해주세요.")
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
  $('#edit').click(function(){
    $('.myinfo').css('display','none')
    $('.edit-info').css('display','block')
  });
  $('#logout').click(function(){
    $('.logout-box').css('display','block')
    $('.modal-container').css('display','block')
  });
</script>