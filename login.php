<?php $page='login' ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");
//BubXKvg-T6kSSr258-FP3BNR
for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.login.php");
   exit;
 }
}
?>
<?php include_once('./head.php') ?>
<?php
  if($user_id){
    alert_back('잘못된 접근입니다.');
  }
?>
    <div class="main">
      <div class="login-center">
        <div class="login-form">
          <div class="login-title">
            로그인
          </div>
          <form class="login" method="post" action="login-check.php">
            <div class="login-input">  
              <input id="e-mail"  type="text" name="user-email" placeholder="이메일" />
              <input id="password"  type="password" name="password" placeholder="비밀번호" />
            </div>
            <div class="login-help">
              <div style="margin-right:10px;">  
                <a href="./find_pw.php">비밀번호 찾기</a>
              </div>
              <div style="border-left:1px solid #ebdaeb; padding-left:10px; ">
                <a href="./signup.php">회원가입</a>
              </div>
            </div>
            <div class="login-btn">
              <button id="login-btn">LOG IN</button>
            </div>
          </form>
          <div class="sns-login">
            <div style="margin-bottom:20px; color:#504f57;">
              <div>혹은 <b>소셜계정</b>으로 간편하게 로그인하세요!</div>
            </div>
            <div class="sns-login-btn">
              <!--
              <div class="sns-btn">
                <div class="btn-box">
                  <img src="./images/sns/sns_insta.png"/>
                </div>
                <div class="text-box">인스타그램</div> 
              </div>
              -->
              <div class="sns-btn">
                <div class="btn-box">
                  <div id="naverIdLogin"></div>
                </div>
                <div class="text-box">네이버</div>
              </div>
              <div class="sns-btn" onclick="loginWithKakao()">
                <div class="btn-box">
                  <img src="./images/sns/sns_kakao.png"/>
                </div>
                <div class="text-box">카카오톡</div> 
              </div>
              <div class="sns-btn" onclick="facebook_click()">
                <div class="btn-box">
                  <img src="./images/sns/sns_facebook.png"/>
                </div>
                <div class="text-box">페이스북</div>
              </div>
              <div class="sns-btn" onclick="google_login()">
                <div class="btn-box">
                  <img src="./images/sns/sns_google.png"/>
                </div>
                <div class="text-box">지메일</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<script>
  
Kakao.init('9559803eb8b03204730f88ea12db70b8');

function loginWithKakao(){
  Kakao.Auth.login({
    success: function(authObj) {
      // alert(JSON.stringify(authObj));
      location.href='./kakao_callback.php?access_token='+authObj.access_token
    },
    fail: function(err) {
      console.log(err)
    }
  });
}

window.fbAsyncInit = function() {
  FB.init({
    appId      : '320990375412532',
    cookie     : true,
    xfbml      : true,
    version    : 'v3.2'
  });
    
  FB.AppEvents.logPageView();   
    
};

(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function facebook_click(){
  alert('서비스 준비중입니다.')
  // FB.login(function(response) {
  //   // handle the response
  // }, {scope: 'public_profile,email'});
}

$(function(){
  gapi.load('auth2', function() {
    auth2 = gapi.auth2.init({
      client_id: '676011647989-pagptrujs79jsqrdrt5lkelukcvt4gbh.apps.googleusercontent.com',
      fetch_basic_profile: false,
      scope: 'profile'
    });
  });
})

function google_login(){
  // Sign the user in, and then retrieve their ID.
  auth2.signIn().then(function() {
    location.href='/google_callback.php?id='+auth2.currentUser.get().getId()
  });
}
</script>

<?php include_once('./footer.php') ?>