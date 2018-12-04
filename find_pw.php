<?php $page="find"; ?>

<?php include_once('./head.php') ?>
    <div class="main">
      <div class="find-center">
        <div style="font-size:36px; margin-bottom:30px;">
          <b>비밀번호</b>를 잊으셨나요?
        </div>
        <div style="margin-bottom:75px; font-size:18px;">
          회원가입 시 인증하신 이메일 주소를 입력해주세요.
        </div>
        <div class="find-form">
          <div>
            <input id="post-mail" type="text" placeholder="이메일" />
          </div>
          <input id="mail-send" type="button" value="SEND">
        </div>
        <div class="modal-container">
          <div class="notice">
            <div style="padding-top:70px; padding-bottom:30px; ">
              입력하신 이메일로<br><b>비밀번호변경 URL</b>이 전송되었습니다.
            </div>
            <div>
              <button id="home" onclick="location.href='./index.php'">HOME</button>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include_once('./footer.php') ?>