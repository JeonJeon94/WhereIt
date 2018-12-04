<?php $page="find" ?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="find-center">
      <div style="font-size:36px; margin-bottom:20px; color:#504f57">
        <b>비밀번호</b>를<br>
        잊으셨나요?
      </div>
      <div style="margin-bottom:40px; font-size:20px; color:#504f57">
        회원가입 시 인증하신<br>
        이메일 주소를 입력해주세요.
      </div>
      <div class="find-form">
        <div>
          <input id="post-mail" type="text" placeholder="이메일" />
        </div>
        <input id="mail-send" type="button" value="SEND">
      </div>
    </div>
    <div class="notice">
      <div style="padding-bottom:100px; font-size:36px; font-family:Noto Sans KR, sans-serif;">
        입력하신 이메일로<br><b>비밀번호변경 URL</b>이<br>전송되었습니다.
      </div>
      <div>
        <button id="home" onclick="location.href='m.index.php'">HOME</button>
      </div>
    </div>
  </div>
<?php include_once("./m.footer.php") ?>