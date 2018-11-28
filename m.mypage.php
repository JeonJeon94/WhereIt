<?php $page = "mypage" ?>
<?php include_once("./m.head.php") ?>
  <div class="modal-container">
    <div class="logout-box">
      <div style="padding-top:70px">
        로그아웃하시겠습니까?
      </div>
      <div class="answer">
        <div class="yes" onclick="location.href='m.index.php'">
          예
        </div>
        <div class="no" onclick="location.href='m.mypage.php'">
          아니오
        </div>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="myinfo">
      <div style="font-size:36px; font-family:Noto Sans KR, sans-serif; margin-bottom:50px;">
        <b>MY</b><br>
        페이지
      </div>
      <div class="user-mail">
        <div style="margin-right:250px; color:#504f57; display:flex; flex:1;">이메일</div>
        <div id="login-email">
          whereit@gmail.com
        </div>
      </div>
      <div class="user-id">
        <div style="margin-right:250px; color:#504f57; display:flex; flex:1;">닉네임</div>
        <div id="login-id">
          whereit
        </div>
      </div>
      <div style="display:flex; margin:30px auto; width:440px;">
        <div class="edit-btn">
          <button id="edit">EDIT</button>
        </div>
        <div class="logout-btn">
          <button id="logout">LOG OUT</button>
        </div>
      </div>
    </div>
    <div class="edit-info">
      <div class="edit-top">
        <div style="font-size:36px; flex:1;">
          <b>회원정보</b><br>
          수정
        </div>
        <div style="font-size:22px; padding-top:30px; font-weight:bold;">
          <div style="float:right; color:#d0c1d0">이메일</div>
          <div >whereit@whereit.kr</div>
        </div>
      </div>
      <div class="edit">
        <form id="edit-form" method="post">
          <input id="password" type="text" name="password" placeholder="기존 비밀번호를 입력해주세요." />
          <input id="new_pw" type="text" name="new_pw" placeholder="변경하실 비밀번호를 입력해주세요." />
          <input id="new_pw2" type="text" name="new_pw2" placeholder="변경하실 비밀번호를 한번 더 입력해주세요." />
          <input id="username" type="text" name="username" placeholder="아이디" />
        </form>
        <div style="text-align:center;">
          <button id="save">SAVE</button>
          <button id="cancel">CANCEL</button>
        </div>
      </div>
    </div>
  </div>
<?php include_once("./m.footer.php") ?>