<?php $page="signup" ?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="sign-center">
      <div class="page-num1">
        <div class="num">01</div>
        <div class="sign-title">
          회원가입
        </div>
        <div class="sign-text">
          회원가입에 필요한<br>
          <b>이메일</b>과<b>비밀번호</b>를 입력해주세요.
        </div>
        <div class="sign-form">
          <div style="padding:10px;">
            <input id="sign-mail" type="text" name="sign-mail" placeholder="이메일을 입력해주세요(whereit@whereit.kr)" />
            <input id="sign-pw" type="password" name="sign-pw" placeholder="비밀번호를 입력해주세요(8자 이상 입력해주세요)" />
          </div>  
          <div class="next-btn">
            <button id="next-btn1">NEXT</button>
          </div>
        </div>
      </div>
      <div class="page-num2">
        <div class="num">02</div>
        <div class="sign-title">
          회원가입
        </div>
        <div class="sign-text">
          회원님만의 <b>멋진 닉네임</b>을
          <br>만들어주세요.
        </div>
        <div class="sign-form">
          <div style="padding:10px;">
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
          <div class="sign-text">
            입력하신 이메일에서 <b>인증절차를 마무리</b> 해주세요.
          </div>
          <div class="home-btn">
            <button id="home-btn" onclick="location.href='m.index.php'">HOME</button>
          </div>
        </div>
      </div>
    </div>
    <div class="accept-contents">
      <div class="contents">
        <div class="contents-title">
          <div id="view-accept">
            이용 약관
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
        <div class="contents-title">
          <div class="view-accept">
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
<?php include_once("./m.footer.php") ?>
<?php if(!empty($_GET['checksum'])){ ?>
  <script>
    email_check()
  </script>  
<?php } ?>