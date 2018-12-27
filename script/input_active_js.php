<script>
  $('#e-mail').keydown(function(key){
    if(key.keyCode == 13){
      $('#password').focus();
      event.preventDefault();
    }
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
  $('#new_pw').keydown(function(key){
    if(key.keyCode == 13){
      $('#new_pw2').focus();
    }
  });
  $('#new_pw2').keydown(function(key){
    if(key.keyCode == 13){
      $('#new-btn').click();
    }
  });
  $('#new-pw2').keydown(function(key){
    if(key.keyCode == 13){
      $('#new-btn').click();
    }
  });
  $('#password_ck').keydown(function(key){
    if(key.keyCode == 13){
      $('#new_pw_ck').focus();
    }
  });
  $('#new_pw_ck').keydown(function(key){
    if(key.keyCode == 13){
      $('#new_pw2_ck').focus();
    }
  });
  $('#new_pw2_ck').keydown(function(key){
    if(key.keyCode == 13){
      $('#username').focus();
    }
  });
  $('#search-word').focus(function(){
    $('#search-word:input').removeAttr('placeholder')
    $('#search-word:input').css('caretColor', '#d8a3d2')
  });
  $('#search-word2').focus(function(){
    $('#search-word2:input').css('caretColor', '#d8a3d2')
  });
  $('#title').focus(function(){
    $('#title:input').removeAttr('placeholder')
    $('#title:input').css('caretColor', '#ADCFE2')
  });
  $('#e_mail').focus(function(){
    $('#e_mail:input').removeAttr('placeholder')
    $('#e_mail:input').css('caretColor', '#ADCFE2')
  });
  $('#e-mail').focus(function(){
    $('#e-mail:input').removeAttr('placeholder')
    $('#e-mail:input').css('caretColor', '#ADCFE2')
  });
  $('#post-mail').focus(function(){
    $('#post-mail:input').removeAttr('placeholder')
    $('#post-mail:input').css('caretColor', '#ADCFE2')
  });
  $('#sign-mail').focus(function(){
    $('#sign-mail:input').removeAttr('placeholder')
    $('#sign-mail:input').css('caretColor', '#ADCFE2')
  });
  $('#sign-pw').focus(function(){
    $('#sign-pw:input').removeAttr('placeholder')
    $('#sign-pw:input').css('caretColor', '#ADCFE2')
  });
  $('#username').focus(function(){
    $('#username:input').removeAttr('placeholder')
    $('#username:input').css('caretColor', '#ADCFE2')
  });
  $('#get-mail').focus(function(){
    $('#get-mail:input').removeAttr('placeholder')
    $('#get-mail:input').css('caretColor', '#ADCFE2')
  });
  $('#new_pw').focus(function(){
    $('#new_pw:input').removeAttr('placeholder')
    $('#new_pw:input').css('caretColor', '#ADCFE2')
  });
  $('#new_pw2').focus(function(){
    $('#new_pw2:input').removeAttr('placeholder')
    $('#new_pw2:input').css('caretColor', '#ADCFE2')
  });
  $('#password').focus(function(){
    $('#password:input').removeAttr('placeholder')
    $('#password:input').css('caretColor', '#ADCFE2')
  });
  $('#password_ck').focus(function(){
    $('#password_ck:input').removeAttr('placeholder')
    $('#password_ck:input').css('caretColor', '#ADCFE2')
  });
  $('#new_pw2_ck').focus(function(){
    $('#new_pw2_ck:input').removeAttr('placeholder')
    $('#new_pw2_ck:input').css('caretColor', '#ADCFE2')
  });
  $('#new_pw_ck').focus(function(){
    $('#new_pw_ck:input').removeAttr('placeholder')
    $('#new_pw_ck:input').css('caretColor', '#ADCFE2')
  });
</script>