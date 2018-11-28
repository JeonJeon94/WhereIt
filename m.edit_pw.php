<?php $page="edit-pw" ?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="edit-center">
      <div style="font-size:36px; margin-bottom:30px;">
        <b>비밀번호를</b><br>
        재설정해주세요.
      </div>
      <div style="margin-bottom:30px; font-size:18px;">
        새롭게 사용하실 비밀번호를 입력해주세요.
      </div>
      <div class="edit-form">
        <form method="post">
          <div style="display:flex; flex-direction:column; align-items:center;">
            <input id="new_pw" type="text" placeholder="비밀번호" />
            <input id="new_pw2" type="text" placeholder="비밀번호 확인" />
          </div>
        </form>
        <div>
          <button id="new-btn">SEND</button>
        </div>
      </div>
    </div>
    <div class="notice">
      <div style="padding-top:30px; padding-bottom:100px; font-size:36px;">
        비밀번호가<br><b>변경되었습니다.</b>
      </div>
      <div>
        <button id="home" onclick="location.href='m.index.php'">HOME</button>
      </div>
    </div>
  </div>
<?php include_once("./m.footer.php") ?>