<script>
  $('#post-mail').keydown(function(key){ 
    if(key.keyCode == 13){
      $('#mail-send').click();
    }
  });
  $('#mail-send').click(function(){
    var email = $('#post-mail').val()
    var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

    if(exptext.test(email)==false){
      return alert("이메일 형식이 올바르지 않습니다.")
      
    }else{
      api_forget_password($('#post-mail').val(), function(res){
        if(res.code == 1){
          if(res.payload == false){
            alert("존재하지 않는 이메일입니다. 이메일을 확인해주세요.")
          }else{
            $('.notice').css('display','block')
            $('.modal-container').css('display','block')
          }
        }else{
            alert("이메일이 올바르지 않습니다!")
        }
      })
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
  $('#username').keydown(function(key){
    if(key.keyCode == 13){
      $('#save').click();
    }
  });
  $('#next-btn2').click(function(){
    let username = $("#username").val();
    let email = $('#sign-mail').val();
    let pw = $('#sign-pw').val();
  
    if($('.checkbox3 img').attr('src') != "./images/box-check.png"){
      return alert("약관에 동의하셔야 가입하실 수 있습니다.")
    }
    if( username.length < 4 || username.length > 16 ){
      return alert("닉네임은 4~16자 사이로 입력해주세요.")
    }
    if(username.search(/\s/) != -1){
      return alert("닉네임에 공백이 포함되어있습니다.") 
    }

    var special_pattern = /[`~!@#$%^&*|\\\'\";:\/?]/gi;
    
    if(special_pattern.test(username) == true){
      return alert("닉네임에 특수문자가 포함되어있습니다.")
    }
    
    location.href='./signup_username.php?username='+username+'&email='+email+'&pw='+pw;
  });
  $('#edit').click(function(){
    $('.myinfo').css('display','none')
    $('.edit-info').css('display','block')
  });
  $('#logout').click(function(){
    $('.logout-box').css('display','block')
    $('.modal-container').css('display','block')
  });
  function email_check(){
    $('.page-num1').css('display','none')
    $('.page-num2').css('display','none')
    $('.signup-end').css('display','block')
  }
  function ask_success(){
    $('#notice').css('display','block')
    $('.modal-container').css('display','block')
  } 
</script>