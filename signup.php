<?php $page="sign";?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.signup.php");
   exit;
 }
}
?>
<?php include_once('./head.php') ?>
    <div class="main">
      <div class="sign-center">
        <div class="page-num1">
          <div class="num">
            01
          </div>
          <div style="font-size:36px; margin-bottom:50px; font-weight:bold; color:#504f57;">
            회원가입
          </div>
          <div style="margin-bottom:40px; color:#504f57;">
            회원가입에 필요한 <b>이메일</b>과<b>비밀번호</b>를 입력해주세요.
          </div>
          <div class="sign-form">
            <div style="display:flex; flex-direction:column; align-items:center;">
              <input id="sign-mail" type="text" name="sign-mail" placeholder="이메일을 입력해주세요(whereit@whereit.kr)" value = "<?php echo (isset($email))?$email:'';?>" />
              <input id="sign-pw" type="password" name="sign-pw" placeholder="비밀번호를 입력해주세요(8자 이상 입력해주세요)" value = "<?php echo (isset($pw))?$pw:'';?>"/>
              <input id="next-btn1" type="button" value="NEXT" />
            </div>
          </div>
        </div>
        <div class="page-num2">
          <div class="num">
            02
          </div>
          <div style="font-size:36px; margin-bottom:50px; font-weight:bold; color:#504f57;">
            회원가입
          </div>
          <div style="margin-bottom:40px; color:#504f57;">
            회원님만의 <b>멋진 닉네임</b>을 만들어주세요.
          </div>
          <div class="sign-form">
            <input id="username" type="text" name="username" placeholder="4~16자의 한글, 영문 또는 숫자로 입력해주세요." maxlength="16" />              
            <div class="accept">
              <div id="accept">
                이용약관
              </div>
              <div id="agree3">
                동의함
              </div>
              <div class="checkbox3">
                <img src="images/box.png"/>
              </div>
            </div>
            <div class="next-btn">
              <button id="next-btn2">NEXT</button>
            </div>
          </div>
        </div>
        <div class="signup-end">
          <div class="end-center">
            <div class="end">
              회원가입이 <b>완료</b>되었습니다.
            </div>
            <div style="margin-bottom: 100px; color:#504f57; color:#504f57;">
              입력하신 이메일에서 <b>인증절차를 마무리</b> 해주세요.
            </div>
            <div class="home-btn">
              <button id="home-btn" onclick="location.href='/login.php'">HOME</button>
            </div>
          </div>
        </div>
        <div class="modal-container">
          <div class="accept-contents">
            <div class="contents">
              <div class="flex" style="align-items:center;">
                <div id="view-accept"style="font-size:20px; flex:1; text-align:left; color:#504f57;">
                  이용약관
                </div>
                <div class="checkbox1">
                  <div id="agree1">동의함</div>
                  <div id="checkbox1">
                    <img src="images/box.png"/>
                  </div>
                </div>
              </div>
              <div class="box">
                <div class="contents-box">
                <?php 
                  $arr = file('./text/use.txt', FILE_TEXT); 
                  foreach($arr as $v){ 
                      echo $v."<br/>";
                  }
                ?>
                </div>
              </div>
            </div>
            <div class="contents">
              <div class="flex" style="align-items:center;">
                <div style="font-size:20px; flex:1; text-align:left; color:#504f57;">
                  개인정보 이용 약관
                </div>
                <div class="checkbox2">
                  <div id="agree2">동의함</div>
                  <div id="checkbox2">
                    <img src="images/box.png"/>
                  </div>
                </div>
              </div>
              <div class="box">
                <div class="contents-box">
                <?php 
                  $arr = file('./text/secret.txt', FILE_TEXT); 
                  foreach($arr as $v){ 
                      echo $v."<br/>";
                  }
                ?>
                </div>
              </div>
            </div>
            <div class="confirm-btn">
              <button id="confirm-btn">CONFIRM</button> 
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include_once('./footer.php') ?>
<?php if(!empty($_GET['checksum'])){ ?>
  <script>
    email_check()
  </script>  
<?php } ?>
