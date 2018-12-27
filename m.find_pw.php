<?php $page="find" ?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="find-center">
      <div class="find-title">
        <b>비밀번호</b>를<br>
        잊으셨나요?
      </div>
      <div class="find-text">
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
      <div style="padding:100px 0 60px 0; font-size:20px; font-family:Noto Sans KR, sans-serif;">
        입력하신 이메일로<br><b>비밀번호변경 URL</b>이<br>전송되었습니다.
      </div>
      <div>
        <button id="home" onclick="location.href='m.index.php'">HOME</button>
      </div>
    </div>
  </div>
<?php include_once("./m.footer.php") ?>