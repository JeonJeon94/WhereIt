<?php $page='login' ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.login.php");
   exit;
 }
}
?>

<?php include_once('./head.php') ?>
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
              <div class="sns-btn">
                <div class="btn-box">
                  <img src="./images/sns/sns_insta.png"/>
                </div>
                <div class="text-box">인스타그램</div> 
              </div>
              <div class="sns-btn">
                <div class="btn-box">
                  <div id="naverIdLogin"></div>
                </div>
                <div class="text-box">네이버</div>
              </div>
              <div class="sns-btn">
                <div class="btn-box">
                  <img src="./images/sns/sns_kakao.png"/>
                </div>
                <div class="text-box">카카오톡</div> 
              </div>
              <div class="sns-btn">
                <div class="btn-box">
                  <img src="./images/sns/sns_facebook.png"/>
                </div>
                <div class="text-box">페이스북</div>
              </div>
              <div class="sns-btn">
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
<?php include_once('./footer.php') ?>